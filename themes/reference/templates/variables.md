---
title: Global variables for templates
menuTitle: Template variables
weight: 50
---
# Global variables for templates
PrestaShop offers preset global variables for the front office Smarty templates.

The variables are set in [`classes/FrontController.php`](https://github.com/PrestaShop/PrestaShop/blob/8.1.x/classes/controller/FrontController.php):

```php
$templateVars = [
    'cart' => $this->cart_presenter->present($cart),
    'currency' => $this->getTemplateVarCurrency(),
    'customer' => $this->getTemplateVarCustomer(),
    'language' => $this->objectPresenter->present($this->context->language),
    'page' => $this->getTemplateVarPage(),
    'shop' => $this->getTemplateVarShop(),
    'core_js_public_path' => $this->getCoreJsPublicPath(),
    'urls' => $this->getTemplateVarUrls(),
    'configuration' => $this->getTemplateVarConfiguration(),
    'field_required' => $this->context->customer->validateFieldsRequiredDatabase(),
    'breadcrumb' => $this->getBreadcrumb(),
    'link' => $this->context->link,
    'time' => time(),
    'static_token' => Tools::getToken(false),
    'token' => Tools::getToken(),
    'debug' => _PS_MODE_DEV_,
];
```

*You can dig into the code to get more information about what the variables do. Here is the list with a short description:*

## List of variables

### User Cart

| Variable | Description |
| --- | --- |
| `{$cart}` | Array containing useful data from the current user's cart. |

### Currency (actual shop currency)

| Variable | Description |
| --- | --- |
| `{$currency.id}` | Currency ID in PrestaShop database |
| `{$currency.name}` | Name of the currency |
| `{$currency.iso_code}` | Currency ISO code |
| `{$currency.iso_code_num}` | Currency ISO code number |
| `{$currency.sign}` | Currency symbol |

### Customer logged-in information 

| Variable | Description |
| --- | --- |
| `{$customer.lastname}` | Customer last name  |
| `{$customer.firstname}` | Customer first name  |
| `{$customer.email}` | Customer email |
| `{$customer.last_passwd_gen}` | The last date customer password was changed  |
| `{$customer.birthday}` | Customer birthday |
| `{$customer.newsletter}` | Receives newsletter |
| `{$customer.newsletter_date_add}` | Newsletter registration date |
| `{$customer.ip_registration_newsletter}` | Newsletter ip registration |
| `{$customer.optin}` | Opt-in subscription |
| `{$customer.website}` | User web site |
| `{$customer.company}` | User company  |
| `{$customer.siret}` | User SIRET |
| `{$customer.ape}` | User APE |
| `{$customer.outstanding_allow_amount}` | Outstanding allow amount (B2B opt)  |
| `{$customer.max_payment_days}` | Max payment day  |
| `{$customer.note}` | Protected note  |
| `{$customer.is_guest}` | Is guest (not registered)  |
| `{$customer.id_shop}` | User Shop ID  |
| `{$customer.id_shop_group}` | Shop Group ID  |
| `{$customer.id_default_group}` | Default group ID  |
| `{$customer.date_add}` | User creation date  |
| `{$customer.date_upd}` | User last modification date  |
| `{$customer.reset_password_token}` | Unique token for forgot password feature  |
| `{$customer.reset_password_validity}` | Token validity date for forgot password feature  |
| `{$customer.id}` | Customer ID  |
| `{$customer.is_logged}` | Is logged in the Shop |
| `{$customer.gender}` | Gender array information |
| `{$customer.risk}` | Risk array information |
| `{$customer.addresses}` | Addresses array information |

### Language store


| Variable | Description |
| --- | --- |
| `{$language}` | An array containing useful data from the current shop language. |

### Actual Page information

| Variable | Description |
| --- | --- |
| `{$page.title}` | Title information |
| `{$page.canonical}` | Friendly-Url |
| `{$page.meta}` | Array with page meta information |
| `{$page.page_name}` | Internal page name |
| `{$page.body_classes}` | Array body page information |
| `{$page.admin_notifications}` | Array admin notifications |
| `{$page.password-policy}` | Array password policy |

### Shop information

| Variable | Description |
| --- | --- |
| `{$shop.id}` | Shop ID |
| `{$shop.name}` | Shop name |
| `{$shop.email}` | Shop email |
| `{$shop.registration_number}` | Shop legal information |
| `{$shop.logo}` | Logo url |
| `{$shop.logo_details}` | Array with logo image information |
| `{$shop.stores_icon}` | Icon image url |
| `{$shop.favicon}` | Favicon image url |
| `{$shop.favicon_update_time}` | Favicon timestamp |
| `{$shop.address}` | Array of full address information |
| `{$shop.phone}` | Shop phone number |
| `{$shop.fax}` | Shop fax number |

### Urls 

| Variable | Description |
| --- | --- |
| `{$urls.base_url}` | Web site url base |
| `{$urls.current_url}` | Actual page url |
| `{$urls.shop_domain_url}` | Shop url |
| `{$urls.img_ps_url}` | Url path for images |
| `{$urls.img_cat_url}` | Url path for category images |
| `{$urls.img_lang_url}` | Url path for language images |
| `{$urls.img_prod_url}` | Url path for product images |
| `{$urls.img_manu_url}` | Url path for manufacturer images |
| `{$urls.img_sup_url}` | Url path for all “No image available” images in different languages |
| `{$urls.img_ship_url}` | Url path for shipping images |
| `{$urls.img_store_url}` | Url path for store images |
| `{$urls.img_col_url}` | Url path for attributes (colors) pictures |
| `{$urls.img_url}` | Url path for theme images assets |
| `{$urls.css_url}` | Url path for theme styles assets |
| `{$urls.js_url}` | Url path for theme javascript assets |
| `{$urls.pic_url}` | Url path for files that would be uploaded by clients for customizable products |
| `{$urls.theme_assets}` | Url path for theme assets |
| `{$urls.alternative_langs}` | An array variable that contains URLs of the current shop's alternative languages. |
| `{$urls.actions}` | An array of URLs representing available actions in the shop. |
| `{$urls.no_picture_image}` | An array variable that contains the dimensions and URLs of all the "no picture" images used in the PrestaShop shop. |
| `{$urls.pages}` | An array of URLs for different pages in PrestaShop (Home Page, Cart, Category, Search, etc.) |

### Configuration

The values set for shop configuration.

| Variable | Description |
| --- | --- |
| `{$configuration.display_taxes_label}` |
| `{$configuration.display_prices_tax_incl}` |
| `{$configuration.taxes_enabled}` |
| `{$configuration.low_quantity_threshold}` |
| `{$configuration.is_b2b}` |
| `{$configuration.is_catalog}` |
| `{$configuration.show_prices}` |
| `{$configuration.opt_in}` |
| `{$configuration.quantity_discount}` |
| `{$configuration.voucher_enabled}` |
| `{$configuration.return_enabled}` |
| `{$configuration.number_of_days_for_return}` |
| `{$configuration.password_policy}` |

### field_required 

| Variable | Description |
| --- | --- |
| `{$field_required}` | Array of errors indicating the fields that are required. |

### breadcrumb

| Variable | Description |
| --- | --- |
| `{$breadcrumb}` | Array containing the description and URL of all the paths that the user has browsed from the home page. |

### link


| Variable | Description |
| --- | --- |
| `{$link}` | Array that contains the main information of the Link Class, including the URL protocol used. |

### time

| Variable | Description |
| --- | --- |
| `{$time}` | Current Unix timestamp|

### token

Retrieve the shop token data used to prevent CSRF (Cross-Site Request Forgery) attacks.

| Variable | Description |
| --- | --- |
| `{$static_token}` | |
| `{$token}` | (generated token, including the PHP page.) |

### debug 

| Variable | Description |
| --- | --- |
| `{$debug}` | Boolean value indicating whether the shop's debug mode is turned on (true) or off (false). |
