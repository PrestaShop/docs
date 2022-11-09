---
menuTitle: displayAdminCustomers
Title: displayAdminCustomers
hidden: true
hookTitle: Display new elements in the Back Office, tab AdminCustomers
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Customer/view.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayAdminCustomers

## Informations

{{% notice tip %}}
**Display new elements in the Back Office, tab AdminCustomers:** 

This hook launches modules when the AdminCustomers tab is displayed in the Back Office
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Customer/view.html.twig

## Hook call with parameters

```php
{{ renderhook('displayAdminCustomers', {'id_customer': customerInformation.customerId.value}) }}
```