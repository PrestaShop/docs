---
menuTitle: displayAdminOrderMainBottom
Title: displayAdminOrderMainBottom
hidden: true
hookTitle: Admin Order Main Column Bottom
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig
locations:
  - back office
type: display
hookAliases:
---

# Hook displayAdminOrderMainBottom

## Information

{{% notice tip %}}
**Admin Order Main Column Bottom:** 

This hook displays content in the order view page at the bottom of the main column
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig)

## Parameters details

```php
    <?php
    array(
      'id_order' => (int) Order ID
    );
```

## Call of the Hook in the origin file

```php
{{ renderhook('displayAdminOrderMainBottom', {'id_order': orderForViewing.id}) }}
```