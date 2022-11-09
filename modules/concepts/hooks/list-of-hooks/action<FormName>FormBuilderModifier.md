---
menuTitle: action<FormName>FormBuilderModifier
Title: action<FormName>FormBuilderModifier
hidden: true
hookTitle: 
files:
  - src/Core/Form/IdentifiableObject/Builder/FormBuilder.php
locations:
  - frontoffice
types:
  - symfony
---

# Hook : action<FormName>FormBuilderModifier

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - symfony

Located in: 
  - src/Core/Form/IdentifiableObject/Builder/FormBuilder.php

## Hook call with parameters

```php
dispatchWithParameters('action' . $this->camelize($formBuilder->getName()) . 'FormBuilderModifier', [
            'form_builder' => $formBuilder,
            'data' => &$data,
            'options' => &$options,
            'id' => $id,
        ]);
```