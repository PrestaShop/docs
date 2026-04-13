---
Title: actionLanguageLinkParameters
hidden: true
hookTitle: 'Add parameters to language link'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Link.php'
        file: classes/Link.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Allows modules to provide proper parameters for links in other languages.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
                    'actionLanguageLinkParameters',
                    ['linkParams' => &$params, 'linkIdLang' => (int) $idLang]
                );
```
