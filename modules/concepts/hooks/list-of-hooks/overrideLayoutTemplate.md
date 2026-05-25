---
Title: overrideLayoutTemplate
hidden: true
hookTitle: ''
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/controller/FrontController.php'
        file: classes/controller/FrontController.php
locations:
    - 'front office'
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
if ($overridden_layout = Hook::exec(
    'overrideLayoutTemplate',
    [
        'default_layout' => $layout,
        'entity' => $entity,
        'locale' => $this->context->language->locale,
        'controller' => $this,
        'content_only' => $content_only,
    ]
)) {
    return $overridden_layout;
}
```
