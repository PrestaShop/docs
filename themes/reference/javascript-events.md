---
title: JavaScript events
weight: 2
---

# JavaScript events

PrestaShop's front-office JavaScript uses a global event bus on the `prestashop` object. The event API (`on`, `emit`) is added by the theme's compiled `theme.js` — Classic and Hummingbird both include this during boot.

{{% notice warning %}}
`prestashop.on()` and `prestashop.emit()` are not available until the theme's `theme.js` has executed. Modules that register listeners before the theme boots will throw a runtime error.
{{% /notice %}}

## Core event reference

| Event | When it fires | Key payload properties |
|-------|--------------|----------------------|
| `updateCart` | After a cart action (add, remove, quantity change, voucher) triggers an AJAX update | `reason` (action context), `resp` (full AJAX response including updated cart data) |
| `updatedCart` | After the cart HTML has been refreshed in the DOM following `updateCart` | `eventType`, `resp` |
| `updateProduct` | On the product page when a variant is selected, the page is navigated via browser history, or `.product-refresh` is clicked — **before** the AJAX call | `eventType`, `event` (original DOM event), `resp` (empty object, kept for compatibility), `reason.productUrl` |
| `updatedProduct` | After the product combination AJAX call completes and the DOM has been updated | Two arguments: `data` (full AJAX response with HTML fragments) and `formData` (serialized form array) |
| `updateProductList` | After a product listing page is updated via AJAX (filter, sort, paginate) | Full AJAX response — includes `current_url` and updated listing HTML |
| `updateFacets` | Emitted by theme listing code (not core) when the user interacts with a facet filter, pagination, or search link — core's `facets.js` listens to this and triggers the AJAX request, then emits `updateProductList` | URL string for the new filter state |
| `clickQuickView` | When a quick-view link is clicked on a product listing card | `dataset` — jQuery `.data()` of the product miniature (includes `id_product`, `id_product_attribute`) |
| `updatedAddressForm` | After the address form is refreshed via AJAX following a country change | `target` (form jQuery object), `resp` (response with updated `address_form` HTML) |
| `editAddress` | When the user clicks "edit addresses" on the checkout addresses step | — |
| `editDelivery` | When the user clicks "edit delivery" on the checkout delivery step | — |
| `updatedDeliveryForm` | After a delivery option is selected and the cart summary has been updated via AJAX | `dataForm` (serialized form array), `deliveryOption` (jQuery object of selected option), `resp` |
| `changedCheckoutStep` | When the user navigates between checkout steps | `event` (original DOM click event) |
| `orderConfirmationErrors` | When the pre-payment cart validation returns errors | `resp` (response with `errors` and `cartUrl`), `paymentObject` |
| `termsUpdated` | When a terms and conditions checkbox changes or a payment option is selected | `isChecked` (boolean — whether all required terms are checked) |
| `handleError` | After any core AJAX request fails | `eventType` (e.g. `updateCart`, `updateAddressForm`), `resp` (failed jqXHR object) |
| `showErrorNextToAddtoCartButton` | Emitted by modules (not core) to display an error near the add-to-cart button — core only listens for it | `errorMessage` (string) |

## Selector initialization events

| Event | Object | Purpose |
|-------|--------|---------|
| `selectorsInit` | `prestashop.selectors` | Core JS selector map is ready |
| `themeSelectorsInit` | `prestashop.themeSelectors` | Theme JS selector map is ready |

See [Overrides]({{< relref "/9/themes/concepts/overrides#selector-overrides" >}}) for how to customize selector maps.
