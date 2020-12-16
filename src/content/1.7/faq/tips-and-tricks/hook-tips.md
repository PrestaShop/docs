---
title: Hook tips
---

# Hook tips

Let's say we are need to add some javascript to order create page. So we use `hookActionAdminControllerSetMedia`.
To filter out only order controller we can do the following:
```php
if ('AdminOrders' === Tools::getValue('controller')) {
    // now we know we are only applying changes to admin order pages,
    // but we aren't yet sure if it's a order create or order view page
}
```

In case we are using Prestashop version lower than 1.7.7.0, then Order page is not yet migrated to Symfony framework
and we can check if it has following query parameters
```php
if (Tools::getValue('addorder')) {
    // this way we know this is order create page
}

if (Tools::getValue('vieworder')) {
    // this way we know this is order view page
}
```

If we are using Prestashop 1.7.7.0 or above, then Order page is already migrated to Symfony framework,
meaning that each page has its own route and a dedicated [action](https://symfony.com/doc/3.4/routing.html),
so one way to check which route we are in would be to extract it from request like following:
```php
$currentRoute = \PrestaShop\PrestaShop\Adapter\SymfonyContainer::getInstance()
    ->get('request_stack')
    ->getMasterRequest()
    ->get('_route')
;

if ('admin_orders_create' === $currentRoute) {
    // now we know for sure, that we are in order create page
}
```

There is even more methods to check it, for example, thanks to `LegacyParametersConverter` which was introduced in 1.7.7.0, you can get controller action using following approach:
```php
$action = Tools::getValue('action');
```
If `legacy_params` are configured correctly, above mentioned code snipped should return 'addorder'
