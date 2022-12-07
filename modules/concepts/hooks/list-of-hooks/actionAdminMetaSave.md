---
menuTitle: actionAdminMetaSave
Title: actionAdminMetaSave
hidden: true
hookTitle: After saving the configuration in AdminMeta
files:
  - src/Adapter/Meta/CommandHandler/AddMetaHandler.php
locations:
  - backoffice
type:
  - action
hookAliases:
 - afterSaveAdminMeta
---

# Hook actionAdminMetaSave

Aliases: 
 - afterSaveAdminMeta



## Information

{{% notice tip %}}
**After saving the configuration in AdminMeta:** 

This hook is displayed after saving the configuration in AdminMeta
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Meta/CommandHandler/AddMetaHandler.php](src/Adapter/Meta/CommandHandler/AddMetaHandler.php)

## Hook call in codebase

```php
dispatchWithParameters('actionAdminMetaSave')
```