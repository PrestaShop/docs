---
title: Cookie
---

# Cookie component

The `Cookie` component is in charge of managing everything that the PrestaShop stores in the `cookie` mechanism of the browser.
It helps set, get, and delete data stored in the `cookie` storage.

All information stored in the `Cookie` component is encrypted before being stored in the `cookie` mechanism for safety reasons. 

## Usage

### Retrieve a `Cookie` instance

A `Cookie` instance is available through [`Context`]({{< relref "/8/development/components/context">}}). 

To get a `Context` instance from a `Controller` subclass or a `Module` subclass, the `Context` should be called with this shortcut: 

```php
$this->context
```

From anywhere else, you can get the `Context` instance by calling:

```php
Context::getContext()
```

Once retrieved a `Context` instance, simply access `Cookie` with: 

```php
$context->cookie
```

### Set data in the `Cookie`

To set a cookie key with the name `mycookie` and the value `myvalue`, do the following: 

```php
$cookie = $this->context->cookie;
$cookie->mycookie = 'myvalue';
```

{{% notice note %}}
The `Cookie` component uses the [magic method `__set()`](https://www.php.net/manual/en/language.oop5.overloading.php#object.set) to allow setting values to the object like they were public properties. 
{{% /notice %}}

### Get data in the `Cookie` 

To get the cookie key with the name `mycookie`, do the following: 

```php
$cookie = $this->context->cookie;
$myCookieValue = $cookie->mycookie;
```

{{% notice note %}}
The `Cookie` component uses the [magic method `__get()`](https://www.php.net/manual/en/language.oop5.overloading.php#object.get) to allow getting values to the object like they were public properties. 
{{% /notice %}}

### Test if a cookie key exists in the `Cookie`

To test if a given key exists in the cookie exists, do the following: 

```php
$cookie = $this->context->cookie;
$cookieExists = isset($cookie->mycookie);
```

{{% notice note %}}
The `Cookie` component uses the [magic method `__isset()`](https://www.php.net/manual/en/language.oop5.overloading.php#object.isset) to allow testing for existence values in the object like they were public properties. 
{{% /notice %}}

### Delete data in the `Cookie`

To delete the key with name `mycookie` from the PrestaShop's cookie, do the following: 

```php
$cookie = $this->context->cookie;
unset($cookie->mycookie);
```

{{% notice note %}}
The `Cookie` component uses the [magic method `__unset()`](https://www.php.net/manual/en/language.oop5.overloading.php#object.unset) to allow unsetting values in the object like they were public properties. 
{{% /notice %}}

## What is stored in Cookies

PrestaShop stores natively in its core (or in native modules) lots of information in Cookies, such as:

| Cookie name | Description | Type | Personal information | Module | Back office context |
| --- | --- | --- | :-: | --- | :-: |
| `date_add` | Date when the cookie was created | `date (Y-m-d H:i:s)` | | | |
| `id_lang` | Current language ID | `integer` | | | |
| `id_currency` | Current currency ID | `integer` | | | |
| `last_visited_category` | ID of the last visited category | `integer` | | ps_categorytree | |
| `id_guest` | ID of the guest customer account | `integer` | | | |
| `id_customer` | ID of the customer account | `integer` | | | |
| `id_connections` | ID of the Connection entity | `integer` | | | |
| `id_country` | ID of the selected country | `integer` | | | |
| `shop_context` | Current shop ID | `integer` | | | |
| `checksum` | Checksum validation string for the cookie | `string` | | | |
| `customer_lastname` | Customer's lastname | `string` | ✅ | | |
| `customer_firstname` | Customer's firstname | `string` | ✅ | | |
| `passwd` | Password of the customer | `string` | ✅ | | |
| `logged` | Indicates whether the customer is logged | `boolean` | | | |
| `email` | Email of the customer | `string` | ✅ | | |
| `id_cart` | ID of the cart | `integer` | | | |
| `remote_addr` | IP address of the customer | `string` | | | |
| `account_created` | Indicates if the customer created their account | `integer` | | | |
| `iso_code_country` | Customer prefered ISO code country | `string` | | | |
| `checkedTOS` | **Deprecated** Replaced with `check_cgv` | `integer` | | | |
| `check_cgv` | Indicates if customer checked terms and conditions | `integer` | | | |
| `contactFormToken` | Contact form token value | `string` | | contactform | |
| `contactFormTokenTTL` | Contact form token time to live (for expiration) | `integer` | | contactform | |
| `viewed` | Viewed product IDs | `array` | | ps_viewedproduct | |
| `is_contributor` | Indicates if employee is contributor | `boolean` | | | ✅ |
| `collapse_menu` | Indicates if the admin menu should be collapsed by default | `boolean` | | | ✅ |
| `last_activity` | Last activity timestamp of employee | `timestamp (integer)` | | | ✅ |
| `employee_form_lang` | ID of the lang for the logged employee | `integer` | | | ✅ |
| `entity_selected` | Export entity selected | `integer` | | | ✅ |
| `csv_selected` | Export format selected | `integer` | | | ✅ |
| `separator_selected` | Export csv separator selected | `integer` | | | ✅ |
| `multiple_value_separator_selected` | Export csv multiple value separator selected | `integer` | | | ✅ |
| `stats_year` | Year selected for stats | `integer` | | | ✅ |
| `stats_month` | Month selected for stats | `integer` | | | ✅ |
| `stats_day` | Day selected for stats | `integer` | | | ✅ |
| `checkup_order` | Checkup module ordering | `integer` | | statscheckup | ✅ |
| `stats_granularity` | Granularity of stats module | `integer` | | statsforecast | ✅ |
| `stats_id_zone` | ID of the zone for stats module | `integer` | | statsforecast | ✅ |
| `statsstock_id_category` | ID of the category for statsstock module | `integer` | | statsstock | ✅ |

{{% notice note %}}
Please note that third-party modules can store other pieces of information with the `Cookie` component.
{{% /notice %}}

### GDPR

If you have questions regarding the GDPR subject on PrestaShop, you will find more information on: [PrestaShop user guide - GDPR](https://docs.prestashop-project.org/v.8-documentation/v/english/user-guide/gdpr)

## Limits

The `cookie` mechanism in browsers has some limitations about how much data you can put in. 

- According to [RFC 6265 (chapter 6.1)](https://datatracker.ietf.org/doc/rfc6265/), browsers must support at least 50 `cookie` per domain and a minimum size of `4096 bytes (4kb)` per cookie (`cookie` name + value / attributes).

- PrestaShop will create only one cookie, in the `$_COOKIE` array, with each key and value data appended to a string and finally encrypted for safety reasons.

- Please note that most browsers will ignore the `cookie` if its size is superior to `4096 bytes`, which makes a limit around **1000 characters** before encryption.

{{% notice note %}}
If you need to store more information, you should consider using server-side storage such as `session` or `database`, or use browser-side storage such as [localStorage](https://developer.mozilla.org/en-US/docs/Web/API/Window/localStorage).
{{% /notice %}}