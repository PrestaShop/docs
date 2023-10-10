---
Title: actionClearSf2Cache
hidden: true
hookTitle: 'Clear Sf2 cache'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Cache/Clearer/SymfonyCacheClearer.php'
        file: src/Adapter/Cache/Clearer/SymfonyCacheClearer.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called when the Symfony cache is cleared'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionClearSf2Cache')
```
