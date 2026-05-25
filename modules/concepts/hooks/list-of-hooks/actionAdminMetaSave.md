---
Title: actionAdminMetaSave
hidden: true
hookTitle: 'After saving the configuration in AdminMeta'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Meta/CommandHandler/AddMetaHandler.php'
        file: src/Adapter/Meta/CommandHandler/AddMetaHandler.php
locations:
    - 'back office'
type: action
hookAliases:
    - afterSaveAdminMeta
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed after saving the configuration in AdminMeta'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$this->hookDispatcher->dispatchWithParameters('actionAdminMetaSave')
```
