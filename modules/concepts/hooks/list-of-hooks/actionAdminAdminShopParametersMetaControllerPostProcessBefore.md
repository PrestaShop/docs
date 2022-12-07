---
menuTitle: actionAdminAdminShopParametersMetaControllerPostProcessBefore
Title: actionAdminAdminShopParametersMetaControllerPostProcessBefore
hidden: true
hookTitle: On post-process in Admin Configure Shop Parameters Meta Controller
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/MetaController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminAdminShopParametersMetaControllerPostProcessBefore

## Information

{{% notice tip %}}
**On post-process in Admin Configure Shop Parameters Meta Controller:** 

This hook is called on Admin Configure Shop Parameters Meta post-process before processing any form
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/MetaController.php](src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/MetaController.php)

## Hook call in codebase

```php
dispatchHook('actionAdminAdminShopParametersMetaControllerPostProcessBefore', ['controller' => $this])
```