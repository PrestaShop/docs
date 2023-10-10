---
menuTitle: actionObjectProductCommentValidateAfter
Title: actionObjectProductCommentValidateAfter
hidden: true
hookTitle: 
files:
    -
        module: productcomments
        url: 'https://github.com/PrestaShop/productcomments/blob/master/ProductComment.php'
        file: ProductComment.php
locations:
    - 'back office'
    - 'front office'
type: action
hookAliases: 
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
