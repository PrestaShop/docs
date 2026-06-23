---
title: One Page Checkout for theme developers
menuTitle: For theme developers
weight: 20
---

# One Page Checkout for theme developers

{{< minver v="9.2" title="true" >}}

Starting with PrestaShop 9.2, the one-page checkout experience is delivered by the
native **`ps_onepagecheckout`** module. If you maintain a theme, whether it is a
fork of Classic, Hummingbird, or a fully custom theme, this page explains
everything you need to know to keep your theme compatible.

{{% notice info %}} **Who this page is for.** If you build or maintain a
PrestaShop front-office theme and want it to work with `ps_onepagecheckout` when
merchants enable it. {{% /notice %}}

## How the module integrates with your theme

`ps_onepagecheckout` uses the standard PrestaShop module template system. **The
module ships its own complete set of front-office templates** and takes over
checkout rendering by returning its template from the `hookDisplayOverrideTemplate`
hook:

```php
// ps_onepagecheckout.php
public function hookDisplayOverrideTemplate(array $params)
{
    if (
        $this->isOnePageCheckoutEnabled()
        && $params['template_file'] === 'checkout/checkout'
        && $params['controller'] instanceof OrderController
    ) {
        return 'module:ps_onepagecheckout/views/templates/front/checkout/checkout.tpl';
    }

    return null;
}
```

This means the checkout works **out of the box on any theme that was created from
Hummingbird** or follows its template structure: you are not required to add any
templates for OPC to function. The module's job is to:

- Provide working default templates for the entire checkout.
- Override the core `checkout/checkout` template when OPC is enabled.
- Inject Smarty variables into the checkout template context.
- Load JavaScript bundles that handle AJAX interactions.
- Expose a runtime configuration object with AJAX endpoint URLs.
- Register a baseline front-office stylesheet (`one-page-checkout.css`).

Your theme's job is to **optionally override** these templates and styles to match
your design, and, when you do, to preserve the DOM contract (IDs, classes,
`<template>` elements) and Smarty variables the module's JavaScript depends on.

{{% notice warning %}} If your theme was created from Classic or provides a custom
theme structure, overrides of the One Page Checkout views will be broader to make
the module compatible with it. {{% /notice %}}

## Templates the module provides

The module ships these templates under `views/templates/front/checkout/`. To
customize the markup, copy a template into your theme at the corresponding
override path and edit it there. If your override drops a required ID, class, or
`<template>` element, the checkout JavaScript will break, so treat the selectors
in the [Required DOM structure](#required-dom-structure) section as a contract.

### Main checkout step template

```text
Module:          views/templates/front/checkout/_partials/steps/one-page-checkout.tpl
Theme override:  modules/ps_onepagecheckout/views/templates/front/checkout/_partials/steps/one-page-checkout.tpl
```

This is the primary template, rendered instead of the native multi-step checkout
when OPC is active. It receives all variables listed in the
[Smarty variables](#smarty-variables) section below. It assembles the checkout by
`{include}`-ing the partials below.

### Partial templates

The full set of partials shipped under `_partials/one-page-checkout/` is available
to preview in the
[module's repository](https://github.com/PrestaShop/ps_onepagecheckout).

Some of these are re-rendered server-side and injected via AJAX as the customer
interacts with the checkout. Each is produced by a dedicated front controller:

| Template                | Rendered by controller | When                                                |
| ----------------------- | ---------------------- | --------------------------------------------------- |
| `addresses-section.tpl` | `addressform`          | Address form display (new address, address editing) |
| `address-list.tpl`      | `addresseslist`        | List of saved addresses after an update             |
| `carriers.tpl`          | `carriers`             | Carrier list refresh after address change           |
| `payment-methods.tpl`   | `paymentmethods`       | Payment method list refresh                         |

The remaining partials (`contact-section.tpl`, `delivery-section.tpl`,
`payment-section.tpl`, `order-options.tpl`, `address-fields.tpl`, and others) are
rendered as part of the initial page and included by the templates above.

## Detecting OPC in templates

The module assigns `is_one_page_checkout_enabled` to the Smarty context **on the
checkout page** (it is set from `hookActionFrontControllerSetVariables`, which only
runs when the current controller is the `OrderController`). Use it to conditionally
render OPC markup:

```smarty
{if $is_one_page_checkout_enabled}
  {* OPC-specific markup *}
{else}
  {* Native multi-step checkout *}
{/if}
```

This variable is `true` only when:

- The merchant has enabled OPC from the back office.
- `ps_onepagecheckout` is the active checkout provider.

{{% notice note %}} Because this variable is only assigned on the checkout page, do
not rely on it being defined in headers, footers, or other page templates. Guard
with `{if isset($is_one_page_checkout_enabled) && $is_one_page_checkout_enabled}`
if you reference it outside the checkout. {{% /notice %}}

## Smarty variables

The following variables are available in `one-page-checkout.tpl`. They are assigned
by `CheckoutOnePageStep` (and `OnePageCheckoutForm::getTemplateVariables()`) during
checkout rendering.

### Customer

```smarty
{$customer.id}              {* int *}
{$customer.firstname}       {* string *}
{$customer.lastname}        {* string *}
{$customer.email}           {* string *}
{$customer.is_guest}        {* bool *}
{$customer.is_logged}       {* bool *}
{$customer.addresses}       {* array of saved address objects *}
```

Each address in `$customer.addresses`:

```smarty
{$address.id}               {* int (normalized from id_address) *}
{$address.id_address}       {* int *}
{$address.alias}            {* string *}
{$address.firstname}        {* string *}
{$address.lastname}         {* string *}
{* ... all standard Address fields *}
```

### Form

```smarty
{$action}                   {* string: form action URL *}
{$token}                    {* string: CSRF token *}

{$formFields}               {* all form fields as FormField objects *}
{$contactFields}            {* email / contact info fields *}
{$additionalCustomerFields} {* extra customer personal info (from modules) *}
{$useSameAddressField}      {* the "use same address for billing" checkbox field *}
{$deliveryFields}           {* delivery address form fields *}
{$invoiceFields}            {* billing address form fields *}
{$invoiceMetaFields}        {* billing address metadata fields *}
```

Each `FormField` object exposes:

- `name`: HTML `name` attribute
- `type`: input type (`text`, `email`, `select`, `radio`, and so on)
- `value`: current value
- `label`: user-facing label
- `required`: bool
- `errors`: array of validation error strings
- `availableValues`: options for `select` and `radio` types

### Carriers

```smarty
{$delivery_options}              {* array: available carriers *}
{$delivery_option}               {* string: selected carrier key *}
{$selected_delivery_option}      {* array: details of selected carrier *}
{$is_virtual_cart}               {* bool: true for digital-only carts *}
{$delivery_message}              {* string: carrier messaging *}
{$recyclable}                    {* bool *}
{$recyclablePackAllowed}         {* bool *}
{$gift.allowed}                  {* bool *}
{$gift.isGift}                   {* bool *}
{$gift.message}                  {* string *}
```

### Payment

```smarty
{$payment_options}               {* array: available payment modules *}
{$selected_payment_module}       {* string: selected payment module name *}
{$selected_payment_selection_key}{* string: selected payment option key *}
{$is_free}                       {* bool: true when cart total is 0 *}
```

### Legal conditions

```smarty
{$conditions_to_approve}         {* associative array: condition key => pre-rendered HTML label *}
```

`conditions_to_approve` comes from PrestaShop core (`ConditionsToApproveFinder`).
It is an **associative array** keyed by the condition identifier, where each value
is the already-rendered HTML for the condition's label. The shipped template
iterates it like this:

```smarty
{foreach from=$conditions_to_approve item="condition" key="condition_name"}
  <input type="checkbox" name="conditions_to_approve[{$condition_name}]" value="1" required>
  <label>{$condition nofilter}</label>
{/foreach}
```

There is no per-condition `id_module`, `id_condition`, or `required` object exposed
by the module: the value is the rendered label string.

### Errors

```smarty
{$errors}                    {* array: general errors *}
{$validation_errors}         {* associative array: field name to error array *}
{$validation_error_messages} {* array<string>: flattened error messages *}
```

### AJAX URLs (also available in Smarty)

```smarty
{$opc_urls}                  {* array: same controller URLs exposed in window.ps_onepagecheckout.urls *}
```

### Hook display variables

These contain pre-rendered HTML from other modules:

```smarty
{$hookDisplayBeforeCarrier}  {* HTML: render before carrier list *}
{$hookDisplayAfterCarrier}   {* HTML: render after carrier list *}
```

Always output these unescaped:

```smarty
{$hookDisplayBeforeCarrier nofilter}
{$hookDisplayAfterCarrier nofilter}
```

## Required DOM structure

The module's JavaScript uses a fixed set of IDs and CSS classes (defined in
`views/js/selectors.js`) to find elements and inject content. If you override the
templates, your markup **must** keep these selectors exactly as documented below,
or the checkout will not function.

### Structural elements

| Selector                     | Role                                                                |
| ---------------------------- | ------------------------------------------------------------------- |
| `.one-page-checkout`         | Main OPC wrapper. Presence of this element activates all OPC JS      |
| `#opc-form`                  | Primary `<form>` element                                            |
| `.one-page-checkout__footer` | Footer area with conditions and pay button                          |

### Address sections

| Selector                              | Role                                            |
| ------------------------------------- | ----------------------------------------------- |
| `.js-opc-addresses-section`           | Wrapper for all address content                 |
| `#opc-delivery-address`               | Delivery address section                        |
| `#opc-delivery-address-fields`        | Delivery form fields container                  |
| `#opc-delivery-address-content-list`  | Saved delivery addresses list (AJAX target)     |
| `#opc-billing-section`                | Billing address section                         |
| `#opc-billing-address-fields`         | Billing form fields container                   |
| `#opc-billing-address-content-list`   | Saved billing addresses list (AJAX target)      |
| `.js-opc-address-radio`               | Radio button for saved address selection        |
| `.opc-address-item`                   | Wrapper for each saved address in the list      |
| `.form-check-label`                   | Address label inside each saved-address item    |
| `[name="use_same_address"]`           | "Use same address for billing" checkbox         |

### Contact section

| Selector                  | Role                                  |
| ------------------------- | ------------------------------------- |
| `.js-opc-contact-section` | Email and personal information section |
| `input[name="email"]`     | Email field                           |

### Carriers

| Selector                          | Role                                    |
| --------------------------------- | --------------------------------------- |
| `#opc-delivery-methods`           | Carrier selection container (AJAX target) |
| `input[name="delivery_option"]`   | Carrier radio buttons                   |

### Payment

| Selector                                    | Role                                  |
| ------------------------------------------- | ------------------------------------- |
| `#opc-payment-methods`                      | Payment methods container (AJAX target) |
| `input[name="payment-option"]`              | Payment radio buttons                 |
| `#pay-with-{paymentOptionId}-form`          | Payment module form wrapper           |
| `#{paymentOptionId}-additional-information` | Payment additional info area          |

### Conditions

| Selector                                                            | Role                                                  |
| ------------------------------------------------------------------- | ----------------------------------------------------- |
| `.one-page-checkout input[name^="conditions_to_approve["][required]` | Required legal-condition checkboxes (gate the pay button) |

### Submit button

| Selector          | Role                                                       |
| ----------------- | ---------------------------------------------------------- |
| `#opc-pay-button` | Submit/pay button, disabled automatically when form is invalid |
| `#opc-pay-amount` | Text node showing the total amount to pay                  |

### Loading and error state templates

The module uses `<template>` elements to inject loading and error states. **Three**
such elements are referenced by the JavaScript (`selectors.js`), and the shipped
templates render them inside `delivery-section.tpl` and `payment-section.tpl`. They
are never shown directly, the JavaScript clones their contents:

```html
<template id="opc-template-loader">
  <!-- Loading skeleton for the carrier list -->
</template>

<template id="opc-template-carriers-error">
  <!-- Error state for carrier loading failure -->
</template>

<template id="opc-template-payment-error">
  <!-- Error state for payment methods loading failure -->
</template>
```

{{% notice note %}} There is **no** `#opc-template-payment-loader`. The payment
list reuses the generic loader markup, so only the three templates above are
referenced by `selectors.js`. {{% /notice %}}

### Address modals

Address creation and editing use modal dialogs. The shipped `addresses-section.tpl`
renders two modal containers (both produced from `address-modal.tpl` with a dynamic
`modal_id`):

```html
<div id="modal-delivery"><!-- delivery address modal --></div>
<div id="modal-invoice"><!-- billing address modal --></div>
```

{{% notice note %}} The module's modal selector is the union
`#opc-address-modal, #modal-delivery, #modal-invoice`. The `#opc-address-modal` id
is accepted by the JavaScript for backward and forward compatibility but is **not**
emitted by the shipped templates: the rendered ids are `#modal-delivery` and
`#modal-invoice`. If you override the templates, keep at least these two ids. {{%
/notice %}}

Modal content is injected server-side by the AJAX `addressform` controller.

## JavaScript events

The module communicates checkout state changes through `prestashop.emit()` events.
Listen to them with `prestashop.on()` to build custom behaviors in your theme.
Event names are defined in `views/js/events.js`.

### Carrier events

```js
prestashop.on('opcCarriersLoading', () => { /* carriers are being fetched (empty payload) */ });

prestashop.on('opcCarriersUpdated', (response) => {
  // The full server response is passed, including:
  //   response.carriers_html:      rendered HTML for carrier list
  //   response.totals:             updated cart totals
  //   response.id_address_delivery
});

prestashop.on('opcCarriersFailed', (event) => {
  // event.resp: normalized error response
});

prestashop.on('opcCarrierSelected', (event) => {
  // event.selectedDeliveryOption: selected delivery option key
  // event.response:               server response
});
```

### Payment events

```js
prestashop.on('opcPaymentMethodsLoading', () => { /* payment methods are being fetched (empty payload) */ });

prestashop.on('opcPaymentMethodsUpdated', (response) => {
  // The full server response is passed, including:
  //   response.payment_html
  //   response.selected_payment_module
  //   response.selected_payment_selection_key
});

prestashop.on('opcPaymentMethodsFailed', (event) => {
  // event.error
});

prestashop.on('opcPaymentMethodSelected', (event) => {
  // event.paymentOptionId
  // event.paymentModule
  // event.paymentSelectionKey
  // event.resp: server response
});
```

### Address events

```js
prestashop.on('opcDeliveryAddressSelected', (event) => {
  // event.idAddress: numeric address ID
  // event.target:    the selected address DOM element
});

prestashop.on('opcBillingAddressSelected', (event) => {
  // event.idAddress
  // event.target
});

prestashop.on('opcDeliveryAddressUpdated', () => { /* delivery address form changed */ });
prestashop.on('opcBillingAddressUpdated',  () => { /* billing address form changed  */ });
prestashop.on('opcBillingSectionToggled',  (event) => {
  // event.visible: bool, whether billing section is now visible
});
```

### Guest and customer events

```js
prestashop.on('opcGuestInitSuccess', (event) => {
  // event.resp.success: bool
  // event.resp.id_customer
  // event.resp.customer_created: bool
  // event.resp.token
});

prestashop.on('opcGuestInitFailed', (event) => {
  // event.resp: normalized error response
});
```

### Submission events

```js
// Fired (with no payload) just before the checkout form is submitted.
// This is a prestashop event, NOT a DOM event: listen with prestashop.on().
prestashop.on('opcFinalSubmitStarted', () => { /* ... */ });

prestashop.on('opcFormValidated', (event) => {
  // event.isValid: bool
});

prestashop.on('opcSubmitFailed', (event) => {
  // event.error: error response
});
```

### Cart total events

```js
prestashop.on('opcCartSummaryBeforeUpdate', (event) => {
  // event.selector: CSS selector for cart summary element
});

prestashop.on('opcCartSummaryUpdated', (event) => {
  // event.selector
});
```

### Other events emitted by the module

The module also emits the following events. They are less commonly needed in themes
but are part of the public event surface defined in `events.js`:

```text
opcPaymentMethodsRefreshed:   payment list re-rendered without a full reload (full response payload)
updatedOpcAddressForm:        an address form was (re)rendered ({ target, resp })
opcCarriersRetry:             user triggered a carrier-load retry
opcPaymentMethodsRetry:       user triggered a payment-load retry
opcGiftWrapping:              gift-wrapping option changed
```

## Runtime configuration object

When OPC is enabled, the module injects `window.ps_onepagecheckout` into the
checkout page (via `Media::addJsDef`). This object contains the AJAX URLs for the
module's controllers, plus localized error messages:

```js
window.ps_onepagecheckout = {
  enabled: true,
  urls: {
    guestInit:      '/module/ps_onepagecheckout/guestinit?ajax=1&action=opcGuestInit',
    addressForm:    '/module/ps_onepagecheckout/addressform?ajax=1&action=opcAddressForm',
    addressesList:  '/module/ps_onepagecheckout/addresseslist?ajax=1&action=opcAddressesList',
    states:         '/module/ps_onepagecheckout/states?ajax=1&action=getStatesByCountry',
    saveAddress:    '/module/ps_onepagecheckout/saveaddress?ajax=1&action=saveOpcAddress',
    deleteAddress:  '/module/ps_onepagecheckout/deleteaddress?ajax=1&action=deleteOpcAddress',
    carriers:       '/module/ps_onepagecheckout/carriers?ajax=1&action=opcCarriers',
    selectCarrier:  '/module/ps_onepagecheckout/selectcarrier?ajax=1&action=opcSelectCarrier',
    paymentMethods: '/module/ps_onepagecheckout/paymentmethods?ajax=1&action=opcPaymentMethods',
    selectPayment:  '/module/ps_onepagecheckout/selectpayment?ajax=1&action=opcSelectPayment',
    opcSubmit:      '/module/ps_onepagecheckout/opcsubmit?ajax=1&action=opcSubmit',
    giftWrapping:   '/module/ps_onepagecheckout/giftwrapping?ajax=1&action=opcGiftWrapping',
    cartTotals:     '/module/ps_onepagecheckout/carttotals?ajax=1&action=opcCartTotals',
  },
  messages: {
    // localized strings used by the JS for error toasts, e.g.:
    loadCarriersFailed:        'Unable to load delivery methods.',
    loadPaymentMethodsFailed:  'Unable to load payment methods.',
    submitFailed:              'Unable to submit checkout.',
    // … one entry per failure case
  }
}
```

{{% notice warning %}} Do not hardcode these URLs in your theme's JavaScript.
Always read from `window.ps_onepagecheckout.urls` so your code stays correct across
shops with custom URL rewrites. The same URL set is also exposed to Smarty as
`{$opc_urls}`. {{% /notice %}}

## JavaScript bundle load order

The module registers its bundles on `hookActionFrontControllerSetMedia` with
explicit priorities. If your theme loads JavaScript that depends on OPC events,
register it with a priority **higher than 158** so it runs after every OPC bundle.

| Bundle                             | Priority |
| ---------------------------------- | -------- |
| `opc-submit.bundle.js`             | 149      |
| `opc-guest-init.bundle.js`         | 150      |
| `opc-address.bundle.js`            | 151      |
| `opc-address-modal.bundle.js`      | 152      |
| `opc-carrier-list.bundle.js`       | 153      |
| `opc-carrier-select.bundle.js`     | 154      |
| `opc-payment-list.bundle.js`       | 155      |
| `opc-payment-select.bundle.js`     | 156      |
| `opc-gift-wrapping.bundle.js`      | 157      |
| `opc-cart-summary-state.bundle.js` | 158      |

{{% notice note %}} The files `one-page-checkout.bundle.js` and
`opc-checkout-layout.bundle.js` exist in `views/public/` but are **not** registered
by the front-office media hook (the layout bundle is used in the back-office
configuration screen). Do not rely on them being loaded on the checkout page. {{%
/notice %}}

## Styling the OPC checkout

The module registers **one baseline front-office stylesheet**,
`views/public/one-page-checkout.css` (handle `module-ps-onepagecheckout`,
priority 200, media `all`), to give the checkout a usable default appearance. It is
intentionally minimal: most of the visual styling is still your theme's
responsibility.

To restyle the checkout:

- Override or extend `one-page-checkout.css` from your theme, or register your own
  stylesheet at a higher priority.
- Use the mandatory CSS class and ID selectors listed in the
  [Required DOM structure](#required-dom-structure) section as stable styling
  anchors. They will not change between patch releases.

The module also ships `views/css/checkout_layout_choice.css`, which is used **only**
by the back-office configuration page and is never loaded on the front office.

## Compatibility checklist

The module works out of the box with its shipped templates and styles. This
checklist matters when your theme **overrides** the OPC templates. Verify before
releasing a theme update for PrestaShop 9.2:

- If you override `one-page-checkout.tpl`, it lives at `templates/checkout/_partials/steps/one-page-checkout.tpl`.
- Overridden AJAX partials (`addresses-section`, `address-list`, `carriers`, `payment-methods`) keep their AJAX target containers.
- The `.one-page-checkout` wrapper is present in the main template.
- `#opc-form` wraps all form fields.
- All required IDs and classes are in place (address sections, pay button, carrier and payment containers).
- The three `<template>` loading/error elements are present (`#opc-template-loader`, `#opc-template-carriers-error`, `#opc-template-payment-error`).
- Address modal containers (`#modal-delivery`, `#modal-invoice`) are present.
- `$hookDisplayBeforeCarrier` and `$hookDisplayAfterCarrier` are rendered with `{nofilter}`.
- `is_one_page_checkout_enabled` is checked (with `isset`) before rendering OPC-specific markup.
- Theme JavaScript that depends on OPC events is loaded after priority 158.
- Theme JavaScript reads endpoints from `window.ps_onepagecheckout.urls`, not hardcoded paths.

## See also

- [One Page Checkout for module developers]({{< relref "module-developers" >}}): the
  checkout architecture, the `actionCheckoutBuildProcess` hook, and payment and
  carrier module compatibility.
