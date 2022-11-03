---
menuTitle: actionPasswordRenew
title: actionPasswordRenew
hidden: true
files:
  - controllers/front/PasswordController.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionPasswordRenew

Located in :

  - controllers/front/PasswordController.php

## Parameters

```php
Hook::exec('actionPasswordRenew', ['customer' => $customer, 'password' => $password]);
```