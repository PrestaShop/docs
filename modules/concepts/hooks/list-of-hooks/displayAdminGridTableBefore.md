---
Title: displayAdminGridTableBefore
hidden: true
hookTitle: 'Display before Grid table'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig
locations:
    - 'back office'
type: display
hookAliases:
    - displayAdminListBefore
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook adds new blocks before Grid component table'

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
      'grid' = Grid $grid,
      'controller' => (string) $controller
      'legacy_controller' => (string) $legacyController
    );
```

## Call of the Hook in the origin file

```php
{{ renderhook('displayAdminGridTableBefore', {
    'grid': grid,
    'legacy_controller': app.request.attributes.get('_legacy_controller'),
    'controller': app.request.attributes.get('_controller')
  })
}}
```
