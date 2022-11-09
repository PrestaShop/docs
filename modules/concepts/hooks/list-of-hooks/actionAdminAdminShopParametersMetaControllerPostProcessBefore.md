---
menuTitle: actionAdminAdminShopParametersMetaControllerPostProcessBefore
Title: actionAdminAdminShopParametersMetaControllerPostProcessBefore
hidden: true
hookTitle: On post-process in Admin Configure Shop Parameters Meta Controller
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/MetaController.php
locations:
  - backoffice
types:
  - symfony
---

# Hook : actionAdminAdminShopParametersMetaControllerPostProcessBefore

## Informations

{{% notice tip %}}
**On post-process in Admin Configure Shop Parameters Meta Controller:** 

This hook is called on Admin Configure Shop Parameters Meta post-process before processing any form
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - symfony

Located in: 
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/MetaController.php

## Hook call with parameters

```php
dispatchHook('actionAdminAdminShopParametersMetaControllerPostProcessBefore', ['controller' => $this]);
```