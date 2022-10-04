---
title: Hook tips
---

# Hook tips

Let's say we need to add some javascript to the 'Order create' BO page. So we use `hookActionAdminControllerSetMedia`.
This hook is called on every BO page, so we need to filter the executions.
```php
if ('AdminOrders' === Tools::getValue('controller')) {
    // now we know we are only applying changes to admin order pages,
    // but we aren't yet sure if it's a order create or order view page
}
```

In case we are using Prestashop version lower than 1.7.7.0, then Order page is not yet migrated to Symfony framework and we can check if it has following query parameters:
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

Other methods are available. For example, thanks to `LegacyParametersConverter` which was introduced in 1.7.7.0, you can get controller action parameter using following approach:

```php
$action = Tools::getValue('action');
```

The configuration `legacy_params` for migrated page allows to link legacy parameters with new Symfony routes. If they are configured correctly, above mentioned code snippet should return 'addorder'. So you can use the legacy parameters to check a Symfony page identity.
