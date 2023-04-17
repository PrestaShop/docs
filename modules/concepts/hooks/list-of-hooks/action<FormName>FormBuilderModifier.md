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
hasExample: true
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

## Example implementation

This hook has been implemented as an example in our [modules examples repository - demoextendsymfonyform1](https://github.com/PrestaShop/example-modules/tree/master/demoextendsymfonyform1).

This hook has been implemented as an example in our [modules examples repository - demoextendsymfonyform2](https://github.com/PrestaShop/example-modules/tree/master/demoextendsymfonyform2).

This hook has been implemented as an example in our [modules examples repository - demoextendsymfonyform3](https://github.com/PrestaShop/example-modules/tree/master/demoextendsymfonyform3).

This hook has been implemented as an example in our [modules examples repository - demoproductform](https://github.com/PrestaShop/example-modules/tree/master/demoproductform).

This hook has been described in the context of Product Page in Back Office in [Extending the new product page form page]({{< relref "/8/modules/sample-modules/extend-product-page" >}})