---
menuTitle: action&lt;FormName>FormBuilderModifier
Title: action<FormName>FormBuilderModifier
hidden: true
hookTitle: 
files:
  - src/Core/Form/IdentifiableObject/Builder/FormBuilder.php
locations:
  - front office
  - back office
type: action
hookAliases:
---

# Hook action&lt;Object>FormBuilderModifier

## Information

{{% notice tip %}}
**Modify an identifiable object form content:**

This hook allows to modify an identifiable object forms content by modifying form builder data or FormBuilder itself.
Replace FormBuilderName by the identitiable object type.
{{% /notice %}}

Hook locations: 
  - back office
  - front office

Hook type: action

Located in: 
  - [src/Core/Form/IdentifiableObject/Builder/FormBuilder.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Form/IdentifiableObject/Builder/FormBuilder.php)

## Call of the Hook in the origin file

```php
$this->hookDispatcher->dispatchWithParameters('action' . $this->camelize($formBuilder->getName()) . 'FormBuilderModifier', [
    'form_builder' => $formBuilder,
    'data' => &$data,
    'options' => &$options,
    'id' => $id
]);
```