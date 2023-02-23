---
menuTitle: displayAdminOrderSide
Title: displayAdminOrderSide
hidden: true
hookTitle: Admin Order Side Column
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig
locations:
  - back office
type: display
hookAliases:
 - displayBackofficeOrderActions
---

# Hook displayAdminOrderSide

Aliases: 
 - displayBackofficeOrderActions

## Information

{{% notice tip %}}
**Admin Order Side Column:** 

This hook displays content in the order view page in the side column under the customer view
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
{{ renderhook('displayAdminOrderSide', {'id_order': orderForViewing.id}) }}
```