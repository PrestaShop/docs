---
menuTitle: displayAdminOrderSide
Title: displayAdminOrderSide
hidden: true
hookTitle: Admin Order Side Column
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig
locations:
  - backoffice
type:
  - display
hookAliases:
 - displayBackOfficeOrderActions
---

# Hook displayAdminOrderSide

Aliases: 
 - displayBackOfficeOrderActions



## Information

{{% notice tip %}}
**Admin Order Side Column:** 

This hook displays content in the order view page in the side column under the customer view
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig](src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig)

## Parameters details

```php
    <?php
    array(
      'id_order' => (int) Order ID
    );
```

## Hook call in codebase

```php
{{ renderhook('displayAdminOrderSide', {'id_order': orderForViewing.id}) }}
```