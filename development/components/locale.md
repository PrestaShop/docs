---
title: The Locale component
menuTitle: Locale
---

# The Locale component

The `Locale` component is in charge of formating numbers, prices and percentages.

It is accessible through the [`Context`]({{< relref "/8/development/components/context" >}})

It provides useful methods such as `formatNumber()` and `formatPrice()`. 

## Initialization of Locale

The `Locale` is initialized with :

- a `code` in [IETF tag](https://en.wikipedia.org/wiki/IETF_language_tag) format (`en-US`, `fr-FR`, ...),
- a `PrestaShop\PrestaShop\Core\Localization\Specification\Number` [`NumberSpecification`](https://github.com/PrestaShop/PrestaShop/blob/8.0.0/src/Core/Localization/Specification/Number.php)
- a `PrestaShop\PrestaShop\Core\Localization\Specification\NumberCollection` [`PriceSpecificationMap`](https://github.com/PrestaShop/PrestaShop/blob/8.0.0/src/Core/Localization/Specification/NumberCollection.php)
- a `PrestaShop\PrestaShop\Core\Localization\Number\Formatter` [`Number formatter`](https://github.com/PrestaShop/PrestaShop/blob/8.0.0/src/Core/Localization/Number/Formatter.php)

## formatNumber() method

This method receives one parameter `$number` as `int`, `float` or `string`. It returns a formatted number, as a `string`, taking the `NumberSpecification` used by the locale, set during its initialization. 

### example of use

With a `en-US` locale, 

```php
$number = 1234.56;

var_dump(Context::getContext()->getCurrentLocale()->formatNumber($number));
```

Will dump:

```php
string(8) "1,234.56"
```

## formatPrice() method

This method receives two parameters, the first one `$number` as  `int`, `float` or `string`, and the second one `$currencyCode` as `string`. It returns a formatted price, as a `string`, taking the matching `PriceSpecification` identified by the `$currencyCode`.

### example of use

With a `en-US` locale, and a `GBP` currency code:

```php
$price = 1234.56;

var_dump(Context::getContext()->getCurrentLocale()->formatPrice($price, 'GBP'));
// string(10) "£1,234.56"
```

With a `en-US` locale, and a `EUR` currency code, 

```php
$price = 1234.56;

var_dump(Context::getContext()->getCurrentLocale()->formatPrice($price, 'EUR'));
// string(10) "€1,234.56"
```