---
menuTitle: displayAdminCustomers
Title: displayAdminCustomers
hidden: true
hookTitle: Display new elements in the Back Office, tab AdminCustomers
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Customer/view.html.twig
locations:
  - back office
type: display
hookAliases:
 - adminCustomers
---

# Hook displayAdminCustomers

Aliases: 
 - adminCustomers



## Information

{{% notice tip %}}
**Display new elements in the Back Office, tab AdminCustomers:** 

This hook launches modules when the AdminCustomers tab is displayed in the Back Office
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [src/PrestaShopBundle/Resources/views/Admin/Sell/Customer/view.html.twig](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Customer/view.html.twig)

## Parameters details

```php
    <?php
    array(
      'id_customer' = (int) Customer ID
    );
```

## Call of the Hook in the origin file

```php
{{ renderhook('displayAdminCustomers', {'id_customer': customerInformation.customerId.value}) }}
```