---
Title: actionAdminThemesControllerUpdate_optionsAfter
hidden: true
hookTitle: ''
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Shop/CommandHandler/UploadLogosHandler.php'
        file: src/Adapter/Shop/CommandHandler/UploadLogosHandler.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$this->hookDispatcher->dispatchWithParameters('actionAdminThemesControllerUpdate_optionsAfter');
```
