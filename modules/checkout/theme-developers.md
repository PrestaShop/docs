---
title: One Page Checkout for theme developers
menuTitle: For theme developers
weight: 20
---

# One Page Checkout for theme developers

{{< minver v="9.2" title="true" >}}

Starting with PrestaShop 9.2, the one-page checkout experience is delivered by the native **`ps_onepagecheckout`** module. If you maintain a theme, whether it is a fork of Classic, Hummingbird, or a fully custom theme, this page explains everything you need to know to keep your theme compatible.

{{% notice info %}} **Who this page is for.** If you build or maintain a PrestaShop front-office theme and want it to work with `ps_onepagecheckout` when merchants enable it. {{% /notice %}}

{{% notice note %}} This page documents the stable integration contract. For the exhaustive, always-current lists (selectors, events, controllers, runtime URLs), the [`ps_onepagecheckout` repository](https://github.com/PrestaShop/ps_onepagecheckout) is the source of truth, and the relevant files are linked from each section below. Where this page and the module's code differ, the code wins. {{% /notice %}}

## How the module integrates with your theme

`ps_onepagecheckout` uses the standard PrestaShop module template system. **The module ships its own complete set of front-office templates** and takes over checkout rendering by returning its template from the `hookDisplayOverrideTemplate` hook:

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

This means the checkout works **out of the box on any theme that was created from Hummingbird** or follows its template structure: you are not required to add any templates for OPC to function. The module's job is to:

- Provide working default templates for the entire checkout.
- Override the core `checkout/checkout` template when OPC is enabled.
- Inject Smarty variables into the checkout template context.
- Load JavaScript bundles that handle AJAX interactions.
- Expose a runtime configuration object with AJAX endpoint URLs.
- Register a baseline front-office stylesheet (`one-page-checkout.css`).

Your theme's job is to **optionally override** these templates and styles to match your design, and, when you do, to preserve the DOM contract (IDs, classes, `<template>` elements) and Smarty variables the module's JavaScript depends on.

{{% notice warning %}} If your theme was created from Classic or provides a custom theme structure, overrides of the One Page Checkout views will be broader to make the module compatible with it. {{% /notice %}}

## Templates the module provides

The module ships these templates under `views/templates/front/checkout/`. To customize the markup, copy a template into your theme at the corresponding override path and edit it there. If your override drops a required ID, class, or `<template>` element, the checkout JavaScript will break, so treat the selectors in the [Required DOM structure](#required-dom-structure) section as a contract.

### Main checkout step template

```text
Module:          views/templates/front/checkout/_partials/steps/one-page-checkout.tpl
Theme override:  modules/ps_onepagecheckout/views/templates/front/checkout/_partials/steps/one-page-checkout.tpl
```

This is the primary template, rendered instead of the native multi-step checkout when OPC is active. It receives all variables listed in the [Smarty variables](#smarty-variables) section below. It assembles the checkout by `{include}`-ing the partials below.

### Partial templates

The full set of partials shipped under `_partials/one-page-checkout/` is available to preview in the [module's repository](https://github.com/PrestaShop/ps_onepagecheckout).

Some of these are re-rendered server-side and injected via AJAX as the customer interacts with the checkout. Each is produced by a dedicated front controller:

| Template                | Rendered by controller | When                                                |
| ----------------------- | ---------------------- | --------------------------------------------------- |
| `addresses-section.tpl` | `addressform`          | Address form display (new address, address editing) |
| `address-list.tpl`      | `addresseslist`        | List of saved addresses after an update             |
| `carriers.tpl`          | `carriers`             | Carrier list refresh after address change           |
| `payment-methods.tpl`   | `paymentmethods`       | Payment method list refresh                         |

The remaining partials (`contact-section.tpl`, `delivery-section.tpl`, `payment-section.tpl`, `order-options.tpl`, `address-fields.tpl`, and others) are rendered as part of the initial page and included by the templates above.

## Detecting OPC in templates

The module assigns `is_one_page_checkout_enabled` to the Smarty context **on the checkout page** (it is set from `hookActionFrontControllerSetVariables`, which only runs when the current controller is the `OrderController`). Use it to conditionally render OPC markup:

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

{{% notice note %}} Because this variable is only assigned on the checkout page, do not rely on it being defined in headers, footers, or other page templates. Guard with `{if isset($is_one_page_checkout_enabled) && $is_one_page_checkout_enabled}` if you reference it outside the checkout. {{% /notice %}}

## Smarty variables

The following variables are available in `one-page-checkout.tpl`. They are assigned by `CheckoutOnePageStep` (and `OnePageCheckoutForm::getTemplateVariables()`) during checkout rendering. This list covers the variables you are most likely to use: the shipped [checkout templates](https://github.com/PrestaShop/ps_onepagecheckout/tree/main/views/templates/front/checkout) are the authoritative reference for everything available in context.

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

`conditions_to_approve` comes from PrestaShop core (`ConditionsToApproveFinder`). It is an **associative array** keyed by the condition identifier, where each value is the already-rendered HTML for the condition's label. The shipped template iterates it like this:

```smarty
{foreach from=$conditions_to_approve item="condition" key="condition_name"}
  <input type="checkbox" name="conditions_to_approve[{$condition_name}]" value="1" required>
  <label>{$condition nofilter}</label>
{/foreach}
```

There is no per-condition `id_module`, `id_condition`, or `required` object exposed by the module: the value is the rendered label string.

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

The module's JavaScript finds elements and injects content through a fixed set of IDs and CSS classes. If you override a template and drop one of these, that part of the checkout stops working. The complete, authoritative mapping is in [`views/js/selectors.js`](https://github.com/PrestaShop/ps_onepagecheckout/blob/main/views/js/selectors.js): treat it as the contract and keep these anchors in your overrides.

The load-bearing ones are:

- **`.one-page-checkout`**: the main wrapper. Its presence activates all OPC JavaScript.
- **`#opc-form`**: the primary `<form>` that wraps every checkout field.
- **AJAX target containers**, refreshed in place without a full reload: `#opc-delivery-address-content-list` and `#opc-billing-address-content-list` (saved addresses), `#opc-delivery-methods` (carriers), and `#opc-payment-methods` (payment methods).
- **`#opc-pay-button`** and **`#opc-pay-amount`**: the submit button (disabled automatically while the form is invalid) and the total-to-pay text node.
- **Payment form wrappers**: `#pay-with-{paymentOptionId}-form` for each payment option.
- **Required legal conditions**: checkboxes matching `input[name^="conditions_to_approve["][required]` gate the pay button.

Two structural details are easy to get wrong when overriding:

{{% notice note %}} **Loading and error templates.** The module clones the contents of three `<template>` elements (rendered inside `delivery-section.tpl` and `payment-section.tpl`): `#opc-template-loader`, `#opc-template-carriers-error`, and `#opc-template-payment-error`. There is no `#opc-template-payment-loader`: the payment list reuses the generic loader. Keep all three in your overrides. {{% /notice %}}

{{% notice note %}} **Address modals.** Address creation and editing use two modal containers rendered by `addresses-section.tpl`: `#modal-delivery` and `#modal-invoice` (their content is injected server-side by the `addressform` controller). The JavaScript also accepts a legacy `#opc-address-modal` id, but the shipped templates emit only the two above, so keep at least those. {{% /notice %}}

## JavaScript events

The module communicates checkout state changes through the PrestaShop event bus. Listen with `prestashop.on()` to re-initialize widgets after an AJAX refresh or to hook into the checkout lifecycle:

```js
// Re-mount widgets when a section is re-rendered over AJAX.
prestashop.on('opcCarriersUpdated', () => remountMyCarrierWidgets());
prestashop.on('opcPaymentMethodsUpdated', () => remountMyPaymentWidgets());

// React just before the final submission (no payload).
// This is a prestashop event, not a DOM event: use prestashop.on(), not addEventListener().
prestashop.on('opcFinalSubmitStarted', () => { /* ... */ });
```

The events fall into a few families:

- **Carriers**: `opcCarriersLoading`, `opcCarriersUpdated`, `opcCarrierSelected`, `opcCarriersFailed`, `opcCarriersRetry`.
- **Payment**: `opcPaymentMethodsLoading`, `opcPaymentMethodsUpdated`, `opcPaymentMethodSelected`, `opcPaymentMethodsFailed`, `opcPaymentMethodsRetry`, `opcPaymentMethodsRefreshed`.
- **Addresses**: `opcDeliveryAddressSelected`, `opcBillingAddressSelected`, `opcDeliveryAddressUpdated`, `opcBillingAddressUpdated`, `opcBillingSectionToggled`, `updatedOpcAddressForm`.
- **Guest and customer**: `opcGuestInitSuccess`, `opcGuestInitFailed`.
- **Submission and validation**: `opcFinalSubmitStarted`, `opcFormValidated`, `opcSubmitFailed`.
- **Cart summary**: `opcCartSummaryBeforeUpdate`, `opcCartSummaryUpdated`.

{{% notice note %}} The complete list of event names and the payload each one carries is defined in [`views/js/events.js`](https://github.com/PrestaShop/ps_onepagecheckout/blob/main/views/js/events.js) (`OPC_EVENTS`). Use it as the authoritative reference: event payloads can change as the module evolves. {{% /notice %}}

## Runtime configuration object

When OPC is enabled, the module injects a `window.ps_onepagecheckout` object into the checkout page (via `Media::addJsDef` from [`ps_onepagecheckout.php`](https://github.com/PrestaShop/ps_onepagecheckout/blob/main/ps_onepagecheckout.php)). It exposes:

- `enabled`: whether OPC is active.
- `urls`: a map of every AJAX endpoint the front-end calls, keyed by name (for example `urls.carriers`, `urls.paymentMethods`, `urls.opcSubmit`). The set of endpoints grows with the module, so read keys from this object rather than assuming a fixed list.
- `messages`: localized error strings used by the JavaScript for toasts.

The same URL map is also exposed to Smarty as `{$opc_urls}`.

{{% notice warning %}} Do not hardcode endpoint URLs in your theme's JavaScript. Always read them from `window.ps_onepagecheckout.urls` (or `{$opc_urls}` in templates) so your code stays correct across shops with custom URL rewrites and across module versions that add or rename endpoints. {{% /notice %}}

## JavaScript bundle load order

The module registers its front-office bundles on `hookActionFrontControllerSetMedia` with explicit priorities (currently in the 149-158 range). If your theme loads JavaScript that depends on OPC events, register it with a priority **higher than the highest OPC bundle** so it runs after all of them, then bind your listeners. The exact priorities are set in [`ps_onepagecheckout.php`](https://github.com/PrestaShop/ps_onepagecheckout/blob/main/ps_onepagecheckout.php); do not assume they are stable across versions.

{{% notice note %}} Not every JavaScript file in `views/public/` is loaded on the checkout page. In particular, `opc-checkout-layout.bundle.js` is used by the back-office configuration screen. Rely on the OPC events and the runtime object rather than on a specific bundle being present. {{% /notice %}}

## Styling the OPC checkout

The module registers **one baseline front-office stylesheet**, `views/public/one-page-checkout.css` (handle `module-ps-onepagecheckout`, priority 200, media `all`), to give the checkout a usable default appearance. It is intentionally minimal: most of the visual styling is still your theme's responsibility.

To restyle the checkout:

- Override or extend `one-page-checkout.css` from your theme, or register your own stylesheet at a higher priority.
- Use the mandatory CSS class and ID selectors listed in the [Required DOM structure](#required-dom-structure) section as stable styling anchors. They will not change between patch releases.

The module also ships `views/css/checkout_layout_choice.css`, which is used **only** by the back-office configuration page and is never loaded on the front office.

## Compatibility checklist

The module works out of the box with its shipped templates and styles. This checklist matters when your theme **overrides** the OPC templates. Verify before releasing a theme update for PrestaShop 9.2:

- If you override `one-page-checkout.tpl`, it lives at `templates/checkout/_partials/steps/one-page-checkout.tpl`.
- Overridden AJAX partials (`addresses-section`, `address-list`, `carriers`, `payment-methods`) keep their AJAX target containers.
- The `.one-page-checkout` wrapper is present in the main template.
- `#opc-form` wraps all form fields.
- All required IDs and classes are in place (address sections, pay button, carrier and payment containers).
- The three `<template>` loading/error elements are present (`#opc-template-loader`, `#opc-template-carriers-error`, `#opc-template-payment-error`).
- Address modal containers (`#modal-delivery`, `#modal-invoice`) are present.
- `$hookDisplayBeforeCarrier` and `$hookDisplayAfterCarrier` are rendered with `{nofilter}`.
- `is_one_page_checkout_enabled` is checked (with `isset`) before rendering OPC-specific markup.
- Theme JavaScript that depends on OPC events is loaded after the OPC bundles.
- Theme JavaScript reads endpoints from `window.ps_onepagecheckout.urls`, not hardcoded paths.

## See also

- [One Page Checkout for module developers]({{< relref "module-developers" >}}): the checkout architecture, the `actionCheckoutBuildProcess` hook, and payment and carrier module compatibility.
