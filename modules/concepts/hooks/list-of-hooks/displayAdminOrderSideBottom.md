---
menuTitle: displayAdminOrderSideBottom
Title: displayAdminOrderSideBottom
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig
locations:
  - backoffice
type:
  - display
hookAliases:
---

# Hook displayAdminOrderSideBottom

## Information

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
{{ renderhook('displayAdminOrderSideBottom', {'id_order': orderForViewing.id}) }}
```