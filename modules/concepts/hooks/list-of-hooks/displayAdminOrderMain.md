---
menuTitle: displayAdminOrderMain
Title: displayAdminOrderMain
hidden: true
hookTitle: Admin Order Main Column
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig
locations:
  - backoffice
type:
  - display
hookAliases:
---

# Hook displayAdminOrderMain

## Information

{{% notice tip %}}
**Admin Order Main Column:** 

This hook displays content in the order view page in the main column under the details view
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
{{ renderhook('displayAdminOrderMain', {'id_order': orderForViewing.id}) }}
```