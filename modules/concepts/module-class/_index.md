---
title: "Module class reference"
menuTitle: "Module class"
---

# Module class reference

## Class attributes

### author

```php
$this->author = "Some Company";
```

- **Type:** string
- **Default:** (empty)
- **Required:** Yes

This attribute contains the name of the module's author. It is displayed as-is in the PrestaShop modules list.

### bootstrap

```php
$this->bootstrap = true;
```

- **Type:** bool
- **Default:** false
- **Required:** No

This attribute indicates that the module's template files have been built with PrestaShop 1.6+ bootstrap tools in mind – and therefore, that PrestaShop should not try to wrap the template code for the configuration screen (if there is one) with helper tags.

We recommend setting this to `true`, unless you specifically need it deactivated.

Note: this option has no effect in Symfony controllers.

### confirmUninstall

```php
$this->confirmUninstall = "Are you sure? Deleting this module will make kittens sad :(";
```

- **Type:** string
- **Default:** (empty)
- **Required:** No

This attribute contains a confirmation message to be displayed when a user attempts to uninstall this module.

### dependencies

```php
$this->dependencies = ['ps_googleanalytics', 'productcomments'];
```

- **Type:** array
- **Default:** (empty)
- **Required:** No

This attribute contains the module's dependencies that PrestaShop checks when installing the module. If one of the dependent modules is unavailable, the installation will fail, and PrestaShop will display a warning.

### description

```php
$this->description = "This module does great things with your shop.";
```

- **Type:** string
- **Default:** (empty)
- **Required:** No

This attribute contains the module's description that will be displayed in module listings.

### displayName

```php
$this->displayName = "My wonderful module";
```

- **Type:** string
- **Default:** (empty)
- **Required:** No

This attribute contains the module name that will be displayed in module listings.

### name

```php
$this->name = "mymodule";
```

- **Type:** string
- **Default:** (empty)
- **Required:** Yes

This attributes serves as an internal identifier (technical name). The value MUST be the same as the module's folder and main class file. Only lower case letters and numbers are accepted.

### need_instance

```php
$this->need_instance = 1;
```

- **Type:** int _(accepted values: `0` or `1`)_
- **Default:** `1`
- **Required:** No

Indicates whether to load the module's class when displaying the "Modules" page in the back office. If set to `0`, the module will not be loaded, and therefore will spend less resources to generate the "Modules" page. If your module needs to display a warning message in the "Modules" page, then you must leave this attribute to `1`.

### ps_versions_compliancy

```php
$this->ps_versions_compliancy = [
    'min' => '1.6',
    'max' => '1.7.6.2',
];
```

- **Type:** array
- **Default:** `1`
- **Required:** No

Indicates which versions of PrestaShop this module is compatible with. The `min` and `max` values define the lower and higher bound of the compatibility range. The example above describes a compatibility range from `1.6.0.0` to `1.7.6.2` (included).

PrestaShop will refuse to install the module if the current shop version is not within the module's compatibility range.

{{% notice tip %}}
It is a good practice to set the upper bound (`max`) to the most recent version of PrestaShop that you have actually tested your module with. Don't assume that if your module has been verified to work with, say, 1.7.5.0, it will automatically work well in all subsequent 1.7 versions.
{{% /notice %}}

### tab

```php
$this->tab = 'front_office_features';
```

- **Type:** string _(accepted values: read below)_
- **Default:** (empty)
- **Required:** Yes

The title for the section that shall contain this module in PrestaShop's back office modules list.You may use an existing name, such as `seo`, `front_office_features` or `analytics_stats`, or a custom one. In this last case, a new section will be created with your identifier. 

Here are the available "Tab" attributes, and their corresponding section in the "Modules" page:

**"Tab" attribute**           | **Module section**
------------------------------|------------------------
`administration`              | Administration
`advertising_marketing`       | Advertising & Marketing
`analytics_stats`             | Analytics & Stats
`billing_invoicing`           | Taxes & Invoices
`checkout`                    | Checkout
`content_management`          | Content Management
`customer_reviews`            | Customer Reviews
`dashboard`                   | Dashboard
`emailing`                    | E-mailing
`export`                      | Export
`front_office_features`       | Front Office Features
`i18n_localization`           | Internationalization & Localization
`market_place`                | Marketplace
`merchandizing`               | Merchandizing
`migration_tools`             | Migration Tools
`mobile`                      | Mobile
`others`                      | Other Modules
`payments_gateways`           | Payments & Gateways
`payment_security`            | Site certification & Fraud prevention
`pricing_promotion`           | Pricing & Promotion
`quick_bulk_update`           | Quick / Bulk update
`search_filter`               | Search & Filter
`seo`                         | SEO
`shipping_logistics`          | Shipping & Logistics
`slideshows`                  | Slideshows
`smart_shopping`              | Comparison site & Feed management
`social_community`            | Social & Community
`social_networks`             | Social Networks

### version

```php
$this->version = '1.0.5';
```

- **Type:** string
- **Default:** (empty)
- **Required:** Yes

The version number for the module, displayed in the modules list. We recommend following the [Semantic Versioning specification](https://semver.org/).
