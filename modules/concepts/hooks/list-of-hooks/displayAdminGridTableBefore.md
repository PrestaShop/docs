---
menuTitle: displayAdminGridTableBefore
Title: displayAdminGridTableBefore
hidden: true
hookTitle: Display before Grid table
files:
  - src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig
locations:
  - backoffice
type:
  - display
hookAliases:
 - displayAdminListBefore
---

# Hook displayAdminGridTableBefore

Aliases: 
 - displayAdminListBefore



## Information

{{% notice tip %}}
**Display before Grid table:** 

This hook adds new blocks before Grid component table
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig](src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig)

## Parameters details

```php
    <?php
    array(
      'grid' = Grid $grid,
      'controller' => (string) $controller
      'legacy_controller' => (string) $legacyController
    );
```

## Hook call in codebase

```php
{{ renderhook('displayAdminGridTableBefore', {
    'grid': grid,
    'legacy_controller': app.request.attributes.get('_legacy_controller'),
    'controller': app.request.attributes.get('_controller')
  })
}}
```