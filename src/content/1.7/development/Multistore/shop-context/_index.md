---
title: Shops context
menuTitle: Shops context
summary: "How to get the current shop context"
weight: 20
---

# Shop context

In many cases, your code will need to know if the multistore mode is enabled, if there are more than one shops activated, and if yes, what is the current shop context. This is where the shop context and multistore feature adapters will come in handy.

## The multistore feature adapter

**Service identifier:** `prestashop.adapter.feature.multistore`  (it takes the legacy configuration adapter as a parameter) <br>
**Class:** `PrestaShop\PrestaShop\Adapter\Feature\MultistoreFeature`


The multistore feature adapter can be used to:

- detect if multistore was enabled in the configuration

- detect if multistore is active (if it is enabled, and if there are more than one active shops)

- enable/disable the multistore feature

Example:

```php
<?php

// get the multistore feature adapter from the service container
$multistoreFeature = $this->get('prestashop.adapter.feature.multistore');

// Is the multistore feature enabled ?
$isMultistoreEnabled = $multistoreFeature->isActive();

// This will check that multistore is enabled AND that there are at least two active shops
$isMultistoreUsed = $multistoreFeature->isUsed();

// Disable / enable multistore feature
$multistoreFeature->disable();
$multistoreFeature->enable();

```

## The shop context adapter

**Service identifier:** `prestashop.adapter.shop.context` <br>
**Class:** `PrestaShop\PrestaShop\Adapter\Shop\Context`

When the multistore feature is enabled, at the top of all the back office pages, a dropdown appears, it allows selecting the shop context we want (all shops, a group shop, a single shop...). The shop context adapter will tell you in what context your are operating.

Here are some examples of commonly used functions in the shop context adapter:

```php
<?php

// get the shop context adapter from the service container
$shopContextAdapter = $this->get('prestashop.adapter.shop.context');

// get a list of all active shops
$shopList = $shopContext->getShops(false, true);

// is the current context a group of shops ?
$isShopGroupContext = $shopContext->isShopGroupContext();

// is the current context a single shop ?
$isSingleShopContext = $shopContext->isSingleShopContext();

// is "all shops" context
$isAllShopContext = $shopContext->isAllContext();


// get a list of IDs for all shops belonging to the current context (useful is the current context is a group) 
$shopList = $shopContext->getContextListShopID();

// get the id of the shop in the current context (useful if the current context is a single shop)
$currentIdShop = $shopContext->getContextShopID();


```

The shop context adapter class has many functions with self-explanatory naming and helpful comments, feel free to [explore it by yourself](https://github.com/PrestaShop/PrestaShop/blob/1.7.7.x/src/Adapter/Shop/Context.php).

