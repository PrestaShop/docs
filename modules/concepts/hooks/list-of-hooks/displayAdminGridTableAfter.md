---
menuTitle: displayAdminGridTableAfter
Title: displayAdminGridTableAfter
hidden: true
hookTitle: Display after Grid table
files:
  - src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig
locations:
  - back office
type: display
hookAliases:
 - displayAdminListAfter
---

# Hook displayAdminGridTableAfter

Aliases: 
 - displayAdminListAfter



## Information

{{% notice tip %}}
**Display after Grid table:** 

This hook adds new blocks after Grid component table
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig)

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
{{ renderhook('displayAdminGridTableAfter', {
      'grid': grid,
      'legacy_controller': app.request.attributes.get('_legacy_controller'),
      'controller': app.request.attributes.get('_controller')
    })
}}
```