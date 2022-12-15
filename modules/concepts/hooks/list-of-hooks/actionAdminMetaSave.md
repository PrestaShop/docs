---
menuTitle: actionAdminMetaSave
Title: actionAdminMetaSave
hidden: true
hookTitle: After saving the configuration in AdminMeta
files:
  - src/Adapter/Meta/CommandHandler/AddMetaHandler.php
locations:
  - back office
type: action
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
  - back office

Hook type: action

Located in: 
  - [src/Adapter/Meta/CommandHandler/AddMetaHandler.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Meta/CommandHandler/AddMetaHandler.php)

## Call of the Hook in the origin file

```php
dispatchWithParameters('actionAdminMetaSave')
```