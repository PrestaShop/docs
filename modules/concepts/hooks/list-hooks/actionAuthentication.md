---
menuTitle: actionAuthentication
title: actionAuthentication
hidden: true
files:
  - classes/form/CustomerLoginForm.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionAuthentication

Located in :

  - classes/form/CustomerLoginForm.php

## Parameters

```php
Hook::exec('actionAuthentication', ['customer' => $this->context->customer]);
```