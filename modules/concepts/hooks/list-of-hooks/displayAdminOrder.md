---
menuTitle: displayAdminOrder
Title: displayAdminOrder
hidden: true
hookTitle: Display new elements in the Back Office, tab AdminOrder
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig
locations:
  - backoffice
type:
  - display
hookAliases:
 - adminOrder
---

# Hook displayAdminOrder

Aliases: 
 - adminOrder



## Information

{{% notice tip %}}
**Display new elements in the Back Office, tab AdminOrder:** 

This hook launches modules when the AdminOrder tab is displayed in the Back Office
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
     'id_order' = (int) Order ID
    );
```

## Hook call in codebase

```php
{{ renderhook('displayAdminOrder', {'id_order': orderForViewing.id}) }}
```