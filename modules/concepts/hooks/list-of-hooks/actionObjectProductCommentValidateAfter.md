---
menuTitle: actionObjectProductCommentValidateAfter
Title: actionObjectProductCommentValidateAfter
hidden: true
hookTitle: null
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/productcomments/ProductComment.php'
        file: modules/productcomments/ProductComment.php
locations:
    - 'back office'
    - 'front office'
type: action
hookAliases: null
origin: module
array_return: false
check_exceptions: false
chain: false
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionObjectProductCommentValidateAfter', ['object' => $this])
```
