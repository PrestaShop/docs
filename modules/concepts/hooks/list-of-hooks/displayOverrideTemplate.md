---
menuTitle: displayOverrideTemplate
Title: displayOverrideTemplate
hidden: true
hookTitle: 'Change the default template of current controller'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php'
        file: classes/controller/FrontController.php
locations:
    - 'front office'
type: display
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

### Before {{< minver v="8.1">}}

```php
Hook::exec(
  'displayOverrideTemplate',
  [
    'controller' => $this,
    'template_file' => $template,
    'id' => $params['id'],
    'locale' => $locale,
  ]
)
```

### From {{< minver v="8.1">}}

```php
Hook::exec(
  'displayOverrideTemplate',
  [
    'controller' => $this,
    'template_file' => $template,
    'entity' => $params['entity'],
    'id' => $params['id'],
    'locale' => $locale,
  ]
)
```
