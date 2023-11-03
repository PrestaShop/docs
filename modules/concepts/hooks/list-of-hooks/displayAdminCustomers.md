---
Title: displayAdminCustomers
hidden: true
hookTitle: 'Display new elements in the Back Office, tab AdminCustomers'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Customer/view.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Sell/Customer/view.html.twig
locations:
    - 'back office'
type: display
hookAliases:
    - adminCustomers
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook launches modules when the AdminCustomers tab is displayed in the Back Office'

---

{{% hookDescriptor %}}

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
