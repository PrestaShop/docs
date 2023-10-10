---
Title: actionBeforeUpdate<FormName>FormHandler
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Form/IdentifiableObject/Handler/FormHandler.php'
        file: src/Core/Form/IdentifiableObject/Handler/FormHandler.php
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
dispatchWithParameters('actionBeforeUpdate' . Container::camelize($form->getName()) . 'FormHandler', [
            'form_data' => &$data,
            'id' => $id,
        ])
```
