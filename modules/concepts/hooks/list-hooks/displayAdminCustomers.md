---
menuTitle: displayAdminCustomers
title: displayAdminCustomers
hidden: true
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Customer/view.html.twig
types:
  - backoffice
hookTypes:
  - twig
---

# Hook : displayAdminCustomers

Located in :

  - src/PrestaShopBundle/Resources/views/Admin/Sell/Customer/view.html.twig

## Parameters

```php
{{ renderhook('displayAdminCustomers', {'id_customer': customerInformation.customerId.value}) }}
```