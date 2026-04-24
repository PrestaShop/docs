---
title: Template variables
weight: 1
aliases:
  - /9/themes/reference/templates/variables
---

# Template variables

PrestaShop exposes global variables to all front-office Smarty templates via [`FrontController.php`](https://github.com/PrestaShop/PrestaShop/blob/develop/classes/controller/FrontController.php). All variables listed on this page are available on every normal front-office page. The maintenance page and the restricted-country page are exceptions. They bypass the normal controller lifecycle and only receive `{$urls}` and `{$shop}`.

## Cart

`{$cart}` is a lazy-loaded object (`CartLazyArray`). Properties are only computed when accessed. Most keys use snake_case. `minimalPurchase` and `minimalPurchaseRequired` are the only camelCase exceptions.

{{% notice warning %}}
On the order-confirmation page, `{$cart}` is an empty unsaved cart. The cart cookie is cleared after purchase. Use `{$order}` to display order data on that page.
{{% /notice %}}

| Variable | Description |
|----------|-------------|
| `{$cart.products}` | Products in the cart with quantities, attributes, and prices |
| `{$cart.products_count}` | Total number of product items |
| `{$cart.totals}` | Total amounts: includes `total` and `total_excluding_tax` keys, each a formatted amount array |
| `{$cart.subtotals}` | Breakdown by line: products, discounts, shipping, wrapping, taxes |
| `{$cart.vouchers}` | Applied cart rules and reductions |
| `{$cart.discounts}` | Additional cart discounts |
| `{$cart.summary_string}` | Localized item count string (e.g., "3 items") |
| `{$cart.labels}` | Tax notation labels (e.g., `tax_short`: "Tax incl.") |
| `{$cart.is_virtual}` | Whether all products in the cart are virtual (no shipping required) |
| `{$cart.id_address_delivery}` | Delivery address ID |
| `{$cart.id_address_invoice}` | Invoice address ID |
| `{$cart.minimalPurchase}` | Minimum required order amount converted to the current currency, `0` if disabled (`PS_PURCHASE_MINIMUM`) |
| `{$cart.minimalPurchaseRequired}` | Translated error message when the cart total (tax excl.) is below the minimum, empty string if the threshold is met or disabled |

## Currency

The active currency for the current request. Available on all pages.

| Variable | Description |
|----------|-------------|
| `{$currency.id}` | Currency ID |
| `{$currency.name}` | Currency name (e.g., "Euro") |
| `{$currency.iso_code}` | ISO 4217 alphabetic code (e.g., `EUR`) |
| `{$currency.iso_code_num}` | ISO 4217 numeric code (e.g., `978`) |
| `{$currency.sign}` | Currency symbol (e.g., `€`) |

## Customer

All keys are present on every page. String keys are empty and `id` is `null` when the customer is not logged in. Always check `{$customer.is_logged}` before using personal data.

| Variable | Description |
|----------|-------------|
| `{$customer.id}` | Customer ID, `null` when not logged in |
| `{$customer.firstname}` | First name |
| `{$customer.lastname}` | Last name |
| `{$customer.email}` | Email address |
| `{$customer.is_logged}` | Whether the customer is authenticated |
| `{$customer.is_guest}` | Whether the customer is a guest |
| `{$customer.active}` | Whether the customer account is active |
| `{$customer.birthday}` | Birthday in `YYYY-MM-DD` format |
| `{$customer.gender}` | Gender, `array` with `id`, `type` (0=male, 1=female, 2=other), and translated `name` |
| `{$customer.company}` | Company name |
| `{$customer.website}` | Website URL |
| `{$customer.siret}` | SIRET number |
| `{$customer.ape}` | APE code |
| `{$customer.newsletter}` | Whether the customer is subscribed to the newsletter |
| `{$customer.newsletter_date_add}` | Newsletter subscription date |
| `{$customer.optin}` | Whether the customer opted in to partner offers |
| `{$customer.outstanding_allow_amount}` | Allowed outstanding credit amount (B2B) |
| `{$customer.max_payment_days}` | Maximum payment period in days (B2B) |
| `{$customer.id_default_group}` | Default customer group ID |
| `{$customer.id_shop}` | Associated shop ID |
| `{$customer.id_shop_group}` | Associated shop group ID |
| `{$customer.date_add}` | Account creation date |
| `{$customer.date_upd}` | Account last modification date |
| `{$customer.risk}` | Risk level, `array` with `id`, `name`, `color`, `percent` (B2B) |
| `{$customer.addresses}` | Saved addresses keyed by address ID, empty when not logged in |

## Language

The active language for the current request. Available on all pages.

| Variable | Description |
|----------|-------------|
| `{$language.id}` | Language ID |
| `{$language.name}` | Language name (e.g., "English") |
| `{$language.iso_code}` | ISO 639-1 code (e.g., `en`) |
| `{$language.locale}` | BCP 47 locale (e.g., `en-US`) |
| `{$language.language_code}` | IETF language tag, lowercase (e.g., `en-us`) |
| `{$language.is_rtl}` | Whether the language reads right-to-left |
| `{$language.active}` | Whether the language is enabled |
| `{$language.date_format_lite}` | Short date format as a PHP `date()` pattern (e.g., `Y-m-d`) |
| `{$language.date_format_full}` | Long date and time format as a PHP `date()` pattern (e.g., `Y-m-d H:i:s`) |

## Country

The country resolved from the customer's address. Available on all pages.

| Variable | Description |
|----------|-------------|
| `{$country.id}` | Country ID |
| `{$country.name}` | Country name (translated to the current language) |
| `{$country.iso_code}` | ISO 3166-1 alpha-2 code (e.g., `FR`) |
| `{$country.call_prefix}` | International dialing prefix (e.g., `33`) |
| `{$country.display_tax_label}` | Whether tax labels should be shown for this country |
| `{$country.contains_states}` | Whether the country is subdivided into states or provinces. Controls state field visibility in address forms |
| `{$country.need_zip_code}` | Whether a postal code field should appear in address forms |
| `{$country.need_identification_number}` | Whether an ID number field (DNI/NIF/NIE) is required in address forms |

## Page

Metadata about the current page: title, SEO tags, body classes, and page identifier. Available on all pages.

| Variable | Description |
|----------|-------------|
| `{$page.title}` | Empty `string` on successful pages. Only set on 404 and error states. Use `{$page.meta.title}` for the `<title>` tag and page-specific variables (e.g., `{$product.name}`) for the visible H1 |
| `{$page.canonical}` | Canonical URL for SEO, set by each controller; `null` if the controller does not define one |
| `{$page.meta.title}` | SEO meta title, always non `empty` at runtime (falls back to shop name) |
| `{$page.meta.description}` | SEO meta description, may be `empty` if not configured in the Back Office |
| `{$page.meta.robots}` | Robots directive, `"index"` by default; `"noindex"` on search results and some CMS pages |
| `{$page.page_name}` | Internal page identifier (e.g., `product`, `category`, `index`, `search`) |
| `{$page.body_classes}` | `key`/`bool` pairs for building the body class attribute, use with the `classnames` modifier |
| `{$page.password-policy}` | [zxcvbn](https://github.com/dropbox/zxcvbn) strength feedback strings, present on every page, consumed by the JS password-strength meter. Requires bracket notation: `{$page['password-policy']}` |

## Shop

General shop information: name, logo, contact details, and address. Available on all pages.

| Variable | Description |
|----------|-------------|
| `{$shop.id}` | Shop ID |
| `{$shop.group_id}` | Shop group ID |
| `{$shop.name}` | Shop name |
| `{$shop.email}` | Shop contact email |
| `{$shop.registration_number}` | Legal registration number (`PS_SHOP_DETAILS`), empty `string` if not configured |
| `{$shop.logo}` | Logo as a full absolute URL, empty `string` if no logo is uploaded |
| `{$shop.logo_details}` | Logo with dimensions, `array` with `src`, `width`, and `height` keys, empty `array` if no logo |
| `{$shop.favicon}` | Favicon as a full absolute URL, empty `string` if not configured |
| `{$shop.favicon_update_time}` | Favicon cache-busting timestamp (`PS_IMG_UPDATE_TIME`) |
| `{$shop.stores_icon}` | Store locator icon as a full absolute URL, empty `string` if not configured |
| `{$shop.phone}` | Phone number, `false` if not configured |
| `{$shop.fax}` | Fax number, `false` if not configured |
| `{$shop.address.formatted}` | Full shop address as HTML with `<br>` line breaks |
| `{$shop.address.address1}` | Street address line 1 |
| `{$shop.address.address2}` | Street address line 2 |
| `{$shop.address.postcode}` | Postal code |
| `{$shop.address.city}` | City |
| `{$shop.address.state}` | State or region name |
| `{$shop.address.country}` | Country name (translated to the current language) |

## URLs

Asset and page URLs for the shop, theme, and standard front-office routes. Available on all pages.

### Base URLs

All values are absolute URLs.

| Variable | Description |
|----------|-------------|
| `{$urls.base_url}` | Shop base URL including language prefix (e.g., `https://example.com/en/`) |
| `{$urls.current_url}` | Current page full URL |
| `{$urls.shop_domain_url}` | Shop domain without language prefix (e.g., `https://example.com/`) |
| `{$urls.img_ps_url}` | PrestaShop core images (`/img/`) |
| `{$urls.img_prod_url}` | Product images (`/img/p/`) |
| `{$urls.img_cat_url}` | Category images (`/img/c/`) |
| `{$urls.img_lang_url}` | Language flag images (`/img/l/`) |
| `{$urls.img_manu_url}` | Manufacturer images (`/img/m/`) |
| `{$urls.img_sup_url}` | Supplier images (`/img/su/`) |
| `{$urls.img_ship_url}` | Carrier images (`/img/s/`) |
| `{$urls.img_store_url}` | Store images (`/img/st/`) |
| `{$urls.img_col_url}` | Color and attribute images (`/img/co/`) |
| `{$urls.img_url}` | Theme image assets |
| `{$urls.css_url}` | Theme CSS assets |
| `{$urls.js_url}` | Theme JavaScript assets |
| `{$urls.theme_assets}` | Theme assets root |
| `{$urls.theme_dir}` | Theme root directory |
| `{$urls.pic_url}` | Customer-uploaded files (`/upload/`) |
| `{$urls.no_picture_image}` | Placeholder image, `array` with `bySize` (named sizes), `small`, `medium`, and `large` keys, each with `url`, `width`, and `height` |
| `{$urls.actions.logout}` | Logout action URL |
| `{$urls.alternative_langs}` | Equivalent page URLs keyed by language code (e.g., `fr-fr`). Empty array on single-language shops |

### Page URLs

Pre-built URLs for standard front-office pages. All values are absolute URLs.

| Variable | Page |
|----------|------|
| `{$urls.pages.index}` | Home |
| `{$urls.pages.cart}` | Cart |
| `{$urls.pages.authentication}` | Login |
| `{$urls.pages.registration}` | Registration |
| `{$urls.pages.register}` | Registration (alias) |
| `{$urls.pages.my_account}` | Customer account |
| `{$urls.pages.identity}` | Account information |
| `{$urls.pages.addresses}` | Saved addresses |
| `{$urls.pages.address}` | Add / edit address |
| `{$urls.pages.history}` | Order history |
| `{$urls.pages.order}` | Checkout |
| `{$urls.pages.order_confirmation}` | Order confirmation |
| `{$urls.pages.order_detail}` | Order detail |
| `{$urls.pages.order_follow}` | Order tracking |
| `{$urls.pages.order_return}` | Order return |
| `{$urls.pages.order_slip}` | Credit slips |
| `{$urls.pages.order_login}` | Checkout with login forced |
| `{$urls.pages.discount}` | Vouchers |
| `{$urls.pages.search}` | Search |
| `{$urls.pages.contact}` | Contact |
| `{$urls.pages.sitemap}` | Sitemap |
| `{$urls.pages.stores}` | Stores |
| `{$urls.pages.cms}` | CMS pages |
| `{$urls.pages.category}` | Categories |
| `{$urls.pages.product}` | Products |
| `{$urls.pages.manufacturer}` | Brands |
| `{$urls.pages.brands}` | Brands (alias) |
| `{$urls.pages.supplier}` | Suppliers |
| `{$urls.pages.prices_drop}` | Sales / price drops |
| `{$urls.pages.new_products}` | New products |
| `{$urls.pages.guest_tracking}` | Guest order tracking |
| `{$urls.pages.password}` | Password reset |
| `{$urls.pages.pagenotfound}` | 404 page |

## Configuration

Shop configuration values relevant to front-office rendering: tax display, stock thresholds, B2B mode, password policy. Available on all pages.

| Variable | Description |
|----------|-------------|
| `{$configuration.display_taxes_label}` | Whether to show tax labels next to prices (based on current country settings) |
| `{$configuration.display_prices_tax_incl}` | Whether prices are displayed tax-inclusive (based on `PS_TAX` and the customer group tax method) |
| `{$configuration.taxes_enabled}` | Whether taxes are enabled in the shop (`PS_TAX`) |
| `{$configuration.low_quantity_threshold}` | Stock quantity below which "low stock" is displayed, default `3` (`PS_LAST_QTIES`) |
| `{$configuration.is_b2b}` | Whether the shop is in B2B mode (`PS_B2B_ENABLE`) |
| `{$configuration.is_catalog}` | Whether the shop is in catalog mode, prices and cart are hidden (`PS_CATALOG_MODE` or geolocation override) |
| `{$configuration.show_prices}` | Whether prices are visible to the current customer group |
| `{$configuration.voucher_enabled}` | Whether vouchers and cart rules are active |
| `{$configuration.return_enabled}` | Whether merchandise returns are enabled (`PS_ORDER_RETURN`) |
| `{$configuration.number_of_days_for_return}` | Number of days allowed to request a return, default `14` (`PS_ORDER_RETURN_NB_DAYS`) |
| `{$configuration.opt_in.partner}` | Whether the partner opt-in checkbox appears on the registration form (`PS_CUSTOMER_OPTIN`) |
| `{$configuration.quantity_discount.type}` | How quantity discounts are displayed, `"price"` (unit price) or `"discount"` (`PS_DISPLAY_DISCOUNT_PRICE`) |
| `{$configuration.quantity_discount.label}` | Translated label for the quantity discount column, `"Unit price"` or `"Unit discount"` |
| `{$configuration.password_policy.minimum_length}` | Minimum password length, default `8` |
| `{$configuration.password_policy.maximum_length}` | Maximum password length, default `72` |
| `{$configuration.password_policy.minimum_score}` | Minimum zxcvbn strength score required, from `0` (any password) to `4` (very strong) |

## Utilities

Miscellaneous helpers: breadcrumb, CSRF tokens, debug flag, and current timestamp. Available on all pages.

| Variable | Description |
|----------|-------------|
| `{$breadcrumb.links}` | Breadcrumb steps, each item has a `title` and a `url`. Always contains at least the Home entry |
| `{$breadcrumb.count}` | Number of breadcrumb steps, at least `1` |
| `{$field_required}` | Array of required field validation errors |
| `{$time}` | Current Unix timestamp |
| `{$static_token}` | CSRF token, stable across requests for the same session (`Tools::getToken(false)`) |
| `{$token}` | CSRF token, changes per page/controller (`Tools::getToken()`) |
| `{$debug}` | Whether developer mode is enabled (`_PS_MODE_DEV_`) |

## Page-specific variables

The variables above are available on every front-office page. Controllers also inject page-specific variables. For example `$product` on the product page, `$listing` on category and search pages, `$order` on the order confirmation page.

See the source controllers in [`classes/controller/`](https://github.com/PrestaShop/PrestaShop/blob/9.0.x/classes/controller/) and the relevant `.tpl` templates for the full list of variables available on each page.
