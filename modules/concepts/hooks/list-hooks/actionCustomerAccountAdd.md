---
menuTitle: actionCustomerAccountAdd
title: actionCustomerAccountAdd
hidden: true
files:
  - classes/form/CustomerPersister.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionCustomerAccountAdd

Located in :

  - classes/form/CustomerPersister.php

## Parameters

```php
Hook::exec('actionCustomerAccountAdd', [
                'newCustomer' => $customer,
            ]);
```