---
title: Cookie
---

# Cookie component

The `Cookie` component is in charge of managing everything that is stored in the `cookie` mecanism of the Browser for `PrestaShop`.
It helps setting, getting and deleting data stored in the `cookie` storage.

Every information stored in the `Cookie` component is encrypted before being stored in the `cookie` mecanism for safety reasons. 

## Usage

### Retrieve a `Cookie` instance

A `Cookie` instance is available through [`Context`]({{< relref "/8/development/components/context">}}). 

To get a `Context` instance, from a `Controller` subclass or a `Module` subclass, the `Context` should be called with this shortcut: 

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

To set a cookie with name `mycookie` and the value `myvalue`, do the following: 

```php
$cookie = $this->context->cookie;
$cookie->mycookie = 'myvalue';
```

{{% notice note %}}
The `Cookie` component uses the [magic method `__set()`](https://www.php.net/manual/en/language.oop5.overloading.php#object.set) to allow setting values to the object like they were public properties. 
{{% /notice %}}

### Get data in the `Cookie` 

To get the cookie with name `mycookie`, do the following: 

```php
$cookie = $this->context->cookie;
$myCookieValue = $cookie->mycookie;
```

{{% notice note %}}
The `Cookie` component uses the [magic method `__get()`](https://www.php.net/manual/en/language.oop5.overloading.php#object.get) to allow getting values to the object like they were public properties. 
{{% /notice %}}

### Test if a cookie exists in the `Cookie`

To test if the cookie with name `mycookie` exists, do the following: 

```php
$cookie = $this->context->cookie;
$cookieExists = isset($cookie->mycookie);
```

{{% notice note %}}
The `Cookie` component uses the [magic method `__isset()`](https://www.php.net/manual/en/language.oop5.overloading.php#object.isset) to allow testing for existence values in the object like they were public properties. 
{{% /notice %}}

### Delete data in the `Cookie`

To delete the cookie with name `mycookie`, do the following: 

```php
$cookie = $this->context->cookie;
unset($cookie->mycookie);
```

{{% notice note %}}
The `Cookie` component uses the [magic method `__unset()`](https://www.php.net/manual/en/language.oop5.overloading.php#object.unset) to allow unsetting values in the object like they were public properties. 
{{% /notice %}}

## What is stored in Cookies

PrestaShop stores natively in its core (or in native modules) lots of informations in Cookies, such as: 

| Cookie name | Description | Type | Personal information | Module | Admin context |
| --- | --- | --- | :-: | --- | :-: |
| `date_add` | Date when the cookie was created | `date (Y-m-d H:i:s)` | | | |
| `id_lang` | Id of selected language | `integer` | | | |
| `id_currency` | Id of selected currency | `integer` | | | |
| `last_visited_category` | Id of the last visited category | `integer` | | ps_categorytree | |
| `id_guest` | Id of the guest customer account | `integer` | | | |
| `id_customer` | Id of the customer account | `integer` | | | |
| `id_connections` | Id of the Connection entity | `integer` | | | |
| `id_countr`y | Id of the selected country | `integer` | | | |
| `shop_context` | Id of the selected shop | `integer` | | | |
| `checksum` | Checkum validation string of the cookie | `string` | | | |
| `customer_lastname` | Lastname of the customer | `string` | ✅ | | |
| `customer_firstname` | Firstname of the customer | `string` | ✅ | | |
| `passwd` | Password of the customer | `string` | ✅ | | |
| `logged` | Indicates wether the customer is logged | `boolean` | | | |
| `email` | Email of the customer | `string` | ✅ | | |
| `id_cart` | Id of the cart | `integer` | | | |
| `remote_addr` | IP address of the customer | `string` | | | |
| `account_created` | Indicates if the customer created its account | `integer` | | | |
| `iso_code_country` | Customer prefered ISO code country | `string` | | | |
| `checkedTOS` | **Deprecated** Replaced with `check_cgv` | `integer` | | | |
| `check_cgv` | Indicates if customer checked terms and conditions | `integer` | | | |
| `contactFormToken` | Contact form token value | `string` | | contactform | |
| `contactFormTokenTTL` | Contact form token time to live (for expiration) | `integer` | | contactform | |
| `viewed` | Viewed product IDs | `array` | | ps_viewedproduct | |
| `is_contributor` | Indicates if employee is contributor | `boolean` | | | ✅ |
| `collapse_menu` | Indicates if the admin menu should be collapsed by default | `boolean` | | | ✅ |
| `last_activity` | Last activity timestamp of employee | `timestamp (integer)` | | | ✅ |
| `employee_form_lang` | Id of the lang for the logged employee | `integer` | | | ✅ |
| `entity_selected` | Export entity selected | `integer` | | | ✅ |
| `csv_selected` | Export format selected | `integer` | | | ✅ |
| `separator_selected` | Export csv separator selected | `integer` | | | ✅ |
| `multiple_value_separator_selected` | Export csv multiple value separator selected | `integer` | | | ✅ |
| `stats_year` | Year selected for stats | `integer` | | | ✅ |
| `stats_month` | Month selected for stats | `integer` | | | ✅ |
| `stats_day` | Day selected for stats | `integer` | | | ✅ |
| `checkup_order` | Checkup module ordering | `integer` | | statscheckup | ✅ |
| `stats_granularity` | Granularity of stats module | `integer` | | statsforecast | ✅ |
| `stats_id_zone` | Id of the zone for stats module | `integer` | | statsforecast | ✅ |
| `statsstock_id_category` | Id of the category for statsstock module | `integer` | | statsstock | ✅ |

{{% notice note %}}
Please note that third party modules can store other information in the `Cookie` component.
{{% /notice %}}

### GDPR

If you have questions regarding the GDPR subject on PrestaShop, you will find more informations on: [PrestaShop user guide - GDPR](https://docs.prestashop-project.org/v.8-documentation/v/english/user-guide/gdpr)

## Limits

The `cookie` mecanism of the Browser comes with some limitation about the quantity of data you can put in. 

- According to [RFC 6265 (chapter 6.1)](https://datatracker.ietf.org/doc/rfc6265/), browsers must support at least 50 `cookie` per demain, and a minimum size of `4096 bytes (4kb)` per cookie (`cookie` name + value / attributes).

- PrestaShop will create only one cookie, in the `$_COOKIE` array, with each key and value data appended to a string, and finally encrypted for safety reasons.

- Although PrestaShop has a hard limit of **1048576** characters, before encryption, please note that most browser will ignore the `cookie` if its size is superior to `4096 bytes`, that makes a limit around **1000 characters** before encryption.

{{% notice note %}}
If you need to store more informations, you should consider using server-side storage such as `Session` or `database`, or use browser-side storage such as [localStorage](https://developer.mozilla.org/en-US/docs/Web/API/Window/localStorage).
{{% /notice %}}