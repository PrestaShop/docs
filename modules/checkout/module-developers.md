---
title: One Page Checkout for module developers
menuTitle: For module developers
weight: 10
---

# One Page Checkout for module developers

{{< minver v="9.2" title="true" >}}

PrestaShop 9.2 introduces a new native One Page Checkout module:
`ps_onepagecheckout`.

This page explains how the module works, how it integrates with the checkout
process, and what module developers need to know to ensure compatibility with
stores using One Page Checkout. It covers the checkout architecture, the
available extension points, and the changes that may affect payment, carrier,
checkout customization, and other modules interacting with the checkout flow.

## What is ps_onepagecheckout?

`ps_onepagecheckout` is the native One Page Checkout module introduced in
PrestaShop 9.2. When enabled, it replaces the standard multi-step checkout with a
single-page checkout experience that combines customer information, delivery
options, and payment methods into a unified flow.

The module is included with PrestaShop 9.2. While installed by default, the One
Page Checkout experience is not enabled automatically. Merchants must enable and
configure it before it becomes active on the front office.

If your module interacts with the checkout process, displays content during
checkout, or modifies checkout behavior, you should review the compatibility
considerations described on this page.

## Module architecture

The module follows a clean, handler-based architecture. Here is an overview of
the key layers.

### Checkout process

The core of the module is how it builds and injects a custom `CheckoutProcess`
into Core's order flow.

- **`OnePageCheckoutProcessProvider`**: implements Core's
  `CheckoutProcessProviderInterface`. This is the object the module returns from
  the hook. It exposes `isEnabled()` and
  `buildCheckoutProcess(CheckoutSession $session, TranslatorComponent $translator): CheckoutProcess`.
- **`OnePageCheckoutProcessBuilder`**: creates the `OnePageCheckoutProcess`
  instance, injecting a single unified step (`CheckoutOnePageStep`) instead of the
  native multi-step flow.
- **`OnePageCheckoutProcess`**: extends Core's `CheckoutProcess` and adds
  `isOnePageCheckoutEnabled()` to reflect the module's own availability check,
  keeping the `is_one_page_checkout_enabled` template variable consistent.
- **`OnePageCheckoutAvailability`**: the single source of truth for whether OPC is
  currently active. It reads the `PS_ONE_PAGE_CHECKOUT_ENABLED` configuration key
  (exposed on the module as
  `Ps_Onepagecheckout::CONFIG_ONE_PAGE_CHECKOUT_ENABLED`).

The classes live under the module's `src/Checkout/` directory and use the
`PrestaShop\Module\PsOnePageCheckout\Checkout` namespace.

### AJAX endpoints

Each checkout interaction is handled by a dedicated front controller under
`controllers/front/`:

| Controller       | Responsibility                                        |
| ---------------- | ----------------------------------------------------- |
| `guestinit`      | Create or resolve guest customer account              |
| `addressform`    | Render the address form (delivery or invoice)         |
| `addresseslist`  | Refresh the list of saved addresses                   |
| `saveaddress`    | Create or update an address                           |
| `deleteaddress`  | Remove a saved address                                |
| `states`         | Return states for a country (cascading dropdowns)     |
| `carriers`       | List available shipping carriers                      |
| `selectcarrier`  | Persist a carrier selection                           |
| `paymentmethods` | List available payment methods                        |
| `selectpayment`  | Persist a payment method selection                    |
| `carttotals`     | Return updated cart totals (voucher/quantity changes) |
| `giftwrapping`   | Toggle or update gift-wrapping options                |

{{% notice note %}} The module declares the routable controllers in its
`$this->controllers` array (`guestinit`, `addressform`, `addresseslist`,
`states`, `saveaddress`, `deleteaddress`, `carriers`, `selectcarrier`,
`paymentmethods`, `selectpayment`, `opcsubmit`). The `carttotals` and
`giftwrapping` controllers also exist as front controllers and are reached
through the runtime URL map. {{% /notice %}}

All controllers extend the abstract base class
`Ps_OnepagecheckoutAbstractOpcJsonFrontController` (in
`controllers/front/AbstractOpcJsonFrontController.php`) and return structured JSON
responses.

### Form layer

- **`OnePageCheckoutFormFactory`**: single factory that wires the checkout form
  and its data persister. Any code that needs the OPC form goes through this
  factory.
- **`OnePageCheckoutForm`**: main form object handling address, customer, and
  delivery data binding.
- **`OnePageCheckoutFormatter`**: prepares all template variables for the checkout
  view.
- **`BackOfficeConfigurationForm`**: handles the back-office configuration
  rendering and submission (Twig-based, targeting PrestaShop 9.2).

### Front-end

JavaScript is bundled with Webpack and organized around feature boundaries:

- `opc-guest-init.js`: guest account creation flow
- `opc-address.js` / `opc-address-modal.js`: address form management
- `opc-carrier-list.js` / `opc-carrier-select.js`: shipping selection
- `opc-payment-list.js` / `opc-payment-select.js`: payment selection
- `opc-submit.js`: final submission and validation feedback
- `events.js`: the JS event contract (see below)

The module also injects a runtime configuration block into the page from
`hookActionFrontControllerSetMedia`, using `Media::addJsDef()` to expose all AJAX
URLs and feature flags as a `window.ps_onepagecheckout` object. The front-end
reads it through a small accessor (`views/js/runtime/opc-runtime.js`). This avoids
hardcoded URLs in JavaScript and keeps the JS/PHP contract explicit.

## The new hook: `actionCheckoutBuildProcess`

This is the hook that lets `ps_onepagecheckout` override the native multi-step
checkout process.

### Purpose

`actionCheckoutBuildProcess` is dispatched by Core **before** the native checkout
process is built. A module implementing this hook returns an object implementing
`CheckoutProcessProviderInterface`. If exactly one **enabled** provider is
returned across all modules, Core uses its checkout process instead of the default
multi-step flow.

### The provider contract

A module does not return a `CheckoutProcess` directly from the hook. It returns a
**provider** implementing this interface:

```php
// src/Adapter/Order/Checkout/CheckoutProcessProviderInterface.php

namespace PrestaShop\PrestaShop\Adapter\Order\Checkout;

use CheckoutProcess;
use CheckoutSession;
use PrestaShopBundle\Translation\TranslatorComponent;

interface CheckoutProcessProviderInterface
{
    /**
     * Indicates whether the module checkout can be used.
     */
    public function isEnabled(): bool;

    /**
     * Builds the checkout process for the current customer session.
     */
    public function buildCheckoutProcess(
        CheckoutSession $session,
        TranslatorComponent $translator
    ): CheckoutProcess;
}
```

The `CheckoutSession` and `TranslatorComponent` are handed to your provider's
`buildCheckoutProcess()` method by Core, not passed as hook parameters. The hook
itself is invoked with an empty parameter array.

### How Core uses it

The resolution logic lives in `CheckoutProcessProviderResolver`
(`src/Adapter/Order/Checkout/CheckoutProcessProviderResolver.php`).

Here is the actual code:

```php
// src/Adapter/Order/Checkout/CheckoutProcessProviderResolver.php

public function resolve(CheckoutSession $session, TranslatorComponent $translator): ?CheckoutProcess
{
    $provider = $this->resolveProvider();
    if ($provider === null) {
        return null; // No single valid provider → use native checkout
    }

    $checkoutProcess = $provider->buildCheckoutProcess($session, $translator);

    return $checkoutProcess instanceof CheckoutProcess ? $checkoutProcess : null;
}

public function resolveProvider(): ?CheckoutProcessProviderInterface
{
    $providers = $this->getValidProviders();

    // Exactly one enabled provider must be registered, otherwise fall back.
    if (count($providers) !== 1) {
        return null;
    }

    return reset($providers);
}

protected function getValidProviders(): array
{
    if ($this->cachedProviders !== null) {
        return $this->cachedProviders;
    }

    $providers = [];
    // true → collect output from every module, keyed by module name.
    $hookOutput = Hook::exec('actionCheckoutBuildProcess', [], null, true);

    if (!is_array($hookOutput)) {
        return $this->cachedProviders = $providers;
    }

    foreach ($hookOutput as $moduleName => $provider) {
        if (!$provider instanceof CheckoutProcessProviderInterface || !$provider->isEnabled()) {
            continue;
        }

        $providers[$moduleName] = $provider;
    }

    return $this->cachedProviders = $providers;
}
```

**Key design decisions:**

1. **All modules are asked, exactly one enabled provider wins.** The hook is
   broadcast to every module. The resolver keeps only providers that are valid
   `CheckoutProcessProviderInterface` instances **and** report
   `isEnabled() === true`. If the count is not exactly one, Core falls back to
   native checkout.
2. **No registration config key.** A provider becomes active simply by returning
   an enabled provider from the hook: there is no configuration key to write on
   install. Conflicts between two enabled providers are resolved by falling back
   to native checkout, not by a "first wins" or "configured module" rule.
3. **Safe fallback by default.** If the hook output isn't an array, contains no
   valid enabled provider, or the provider's `buildCheckoutProcess()` returns
   something other than a `CheckoutProcess` instance, Core uses its own native
   checkout. There is no risk of a broken checkout from a module returning an
   unexpected value.

### Where it is dispatched

`OrderController::buildCheckoutProcess()` calls the resolver before constructing
the native process:

```php
// controllers/front/OrderController.php

protected function buildCheckoutProcess(CheckoutSession $session, $translator)
{
    /** @var CheckoutProcessProviderResolver $checkoutProcessProviderResolver */
    $checkoutProcessProviderResolver = $this->get(CheckoutProcessProviderResolver::class);
    $resolvedCheckoutProcess = $checkoutProcessProviderResolver->resolve($session, $translator);
    if ($resolvedCheckoutProcess instanceof CheckoutProcess) {
        return $resolvedCheckoutProcess; // Module-provided process wins
    }

    // …otherwise build the native multi-step CheckoutProcess
}
```

### How ps_onepagecheckout implements it

```php
// ps_onepagecheckout.php

public function install()
{
    return $this->installInParent()
        && $this->installOnePageCheckoutConfiguration()
        && $this->registerHook('actionCheckoutBuildProcess')
        && $this->registerHook('actionFrontControllerSetMedia')
        // … other hooks
    ;
}

public function hookActionCheckoutBuildProcess(array $params = []): CheckoutProcessProviderInterface
{
    return new OnePageCheckoutProcessProvider($this->context, $this);
}
```

On install, the module registers the hook (and sets its
`PS_ONE_PAGE_CHECKOUT_ENABLED` configuration). On uninstall, it clears that
configuration. The provider it returns reports `isEnabled()` based on that same
configuration key, so disabling OPC transparently restores native checkout.

## Payment modules compatibility

Payment modules integrate with OPC through the standard Core `paymentOptions`
hook: there is nothing OPC-specific you need to do to appear in the payment list.
OPC gathers options through Core's `PaymentOptionsFinder`, so any module that
already returns valid `PaymentOption` objects shows up automatically. See the
[Payment modules]({{< relref "/9/modules/payment" >}}) documentation for how to
build payment options.

There are two integration styles, depending on how your payment is submitted.

### Form-based payment options

If your `PaymentOption` provides a `form` (or `action` and `inputs`), OPC renders
it inside a `#pay-with-{id}-form` wrapper and submits it for you when the customer
clicks **Place Order**. OPC first persists the checkout data (customer, address,
delivery method) via its own AJAX submission, then submits your payment form. No
extra code is required on your side: this is the default path.

### Self-submitting (binary) payment options

Payment modules that drive submission themselves, such as smart buttons, hosted
fields, or redirect/iframe flows that set `binary = true`, are handled by the
module itself. OPC does **not** try to submit an inner form for these: your module
owns the submit and redirect.

Because OPC still needs the checkout data (customer, selected address, and
delivery method) persisted **before** your payment flow takes over, the module
exposes a JavaScript entry point:

```js
window.ps_onepagecheckout.submitBeforePayment();
```

Call it from your payment flow **before** submitting or redirecting. It:

- validates the checkout preconditions (a payment method is selected, the form is
  valid),
- persists the customer, address, and selected delivery method through OPC's
  submit endpoint,
- returns a `Promise`: resolve before continuing, and handle rejection (it rejects
  with `"OPC form not found."` if the OPC form isn't on the page),
- does **not** place the order or redirect: that remains your module's
  responsibility.

Call it **once per order attempt**.

OPC guards against concurrent submissions internally (an in-flight flag), so a
second call made while the first is still running returns early without persisting
anything. Trigger it from a single submit handler rather than from multiple event
paths.

```js
// Inside your payment module's submit handler (e.g. smart-button click)
try {
  await window.ps_onepagecheckout.submitBeforePayment();
  // OPC has now saved customer / address / delivery method.
  // Proceed with your own payment submission or redirect.
  startMyPaymentFlow();
} catch (error) {
  // OPC form unavailable or preconditions not met: abort the payment.
}
```

## Reacting to checkout updates

One Page Checkout dynamically updates parts of the checkout page as the customer
interacts with it. Depending on the action performed, sections such as carriers,
payment methods, addresses, or the cart summary may be refreshed without a full
page reload.

If your module injects JavaScript widgets, buttons, hosted fields, iframes, or
custom event listeners into any of these sections, make sure they can be
re-initialized after an update.

For example, payment modules should listen to `opcPaymentMethodsUpdated` and
re-mount their components whenever the payment methods section is refreshed:

```js
prestashop.on('opcPaymentMethodsUpdated', () => {
  remountMyPaymentWidgets();
});
```

Similarly, carrier modules may find the following events useful:

- `opcCarrierSelected`
- `opcCarriersUpdated`
- `opcCarriersLoading`
- `opcCarriersFailed`

Other checkout-related events are available for address updates, cart summary
refreshes, payment selection, form validation, and checkout submission.

All events are emitted through the PrestaShop JavaScript event bus and can be
consumed using `prestashop.on(...)`. The complete list of available events is
defined in `views/js/events.js` (`OPC_EVENTS`).

## JavaScript event: `opcFinalSubmitStarted`

If your module needs to react just before the final checkout submission, you can
listen to the `opcFinalSubmitStarted` event emitted by `ps_onepagecheckout`.

The event is emitted through PrestaShop's JavaScript event bus (`prestashop.emit`
and `prestashop.on`), not as a native DOM `CustomEvent`:

```js
// Emitted by ps_onepagecheckout
prestashop.emit('opcFinalSubmitStarted');
```

To subscribe to the event:

```js
prestashop.on('opcFinalSubmitStarted', () => {
  // react just before the final checkout form is submitted
});
```

Keep the following in mind:

- The event is available only when One Page Checkout is enabled and the
  `ps_onepagecheckout` assets are loaded.
- The event must be consumed through the PrestaShop event bus, not through
  `document.addEventListener()`.
- No payload is provided with the event.

The complete list of events emitted by the module is defined in
`views/js/events.js` (`OPC_EVENTS`).

## If your module extends or injects into the OPC flow

If your module adds steps, modifies templates, or injects data into the OPC
checkout:

- Check whether you were relying on Core classes or hooks that changed in 9.2
  (much of the OPC-specific logic now lives in `ps_onepagecheckout`).
- The `PS_ONE_PAGE_CHECKOUT_ENABLED` configuration key is still **defined and read
  by Core** (via `OnePageCheckoutAvailabilityChecker` / `OnePageCheckoutSettings`),
  but the `ps_onepagecheckout` module now **provisions it** on install/uninstall
  and toggles it on enable/disable. Treat the module as the writer, and Core and
  the module as the readers.

### If your module uses `actionFrontControllerSetMedia` or `actionFrontControllerSetVariables`

Verify that your assets load after `ps_onepagecheckout` registers its scripts, or
declare a dependency.

### If your module reads `is_one_page_checkout_enabled` in templates

This template variable is still available in the checkout template. It reflects
the module's availability check (which in turn reads
`PS_ONE_PAGE_CHECKOUT_ENABLED`). No action needed: the variable works the same way
as before.

## New behavior of the checkout process

| Area                          | Previous behavior                                | 9.2 behavior                                                                                |
| ----------------------------- | ------------------------------------------------ | ------------------------------------------------------------------------------------------- |
| OPC flow                      | Driven largely from Core (`OrderController`)     | Provided by the `ps_onepagecheckout` module                                                 |
| Custom checkout injection     | No standard hook, overrides required             | `actionCheckoutBuildProcess` hook                                                           |
| Hook return value             | N/A                                              | Module returns a `CheckoutProcessProviderInterface`, not a `CheckoutProcess` directly       |
| Provider selection            | No standard mechanism                            | Resolver picks the single **enabled** provider, otherwise multiple or none means native fallback |
| `PS_ONE_PAGE_CHECKOUT_ENABLED` | Provisioned by Core                             | Provisioned by `ps_onepagecheckout` on install/uninstall, still read by Core                |
| Checkout fallback             | Native checkout always available                 | Native checkout used unless exactly one enabled provider is registered                      |

## Compatibility

These changes ship in **PrestaShop 9.2.0** and **`ps_onepagecheckout` 0.4.0**. The
module declares compliance with PrestaShop `>= 9.2.0`.

Modules targeting older PrestaShop versions are not affected. The
`actionCheckoutBuildProcess` hook and `CheckoutProcessProviderInterface` do not
exist in versions prior to 9.2, so guard your hook registration and any
`instanceof` and type references accordingly if your module supports a version
range.

## See also

- [One Page Checkout for theme developers]({{< relref "theme-developers" >}}): the
  template override paths, required DOM structure, Smarty variables, and JavaScript
  events your theme must respect.

## Resources

- [PR #41047: introduce the One Page Checkout hook](https://github.com/PrestaShop/PrestaShop/pull/41047)
- [`ps_onepagecheckout` module repository](https://github.com/PrestaShop/ps_onepagecheckout)
- [PrestaShop module developer documentation]({{< relref "/9/modules" >}})
