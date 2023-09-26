---
title: Forms with Symfony
menuTitle: Form
useMermaid: true
---

# Forms with Symfony

## Introduction

With Symfony, `Forms` are built, rendered and handled in separate layers. Several concepts are involved, such as form building, providing data to forms, validating data, persisting data submited by forms, rendering forms, ...

- [`Controllers`](#controllers) - Handles all logic for the `Form`
- [`FormBuilder`](#form-builder) - Builds the `Form`, and provide data to the `Form`
    - [`FormDataProvider`](#form-data-provider) - Provides data to the `Form`
- [`Form`](#form-types) - Defines the `Form` and its content
- [`Form Theme`](#form-theme) - Allows to customise the style of the `Form`
- `Form Templates` - Allows to render the `Form` with `Twig`
- [`FormHandler`](#form-handler) - Handles the submited `Form`, provides data to the `FormDataHandler`, and handles `FormHandlerResult`
    - [`FormDataHandler`](#form-handler) - Persists the data to `Database`

<div class='mermaid'>
graph
    AA(Http Request)-.->A
    subgraph Core
        subgraph Admin Theme
            K(Form Theme)
        end
        subgraph Render form
            A(Controller)-->O(FormBuilder)
            O-->|1|M(FormDataProvider)
            M-->|2|O
            O-->|3|P(Form)
            P-->F(Rendered Form)
            K-->F
            A-->Q(Form Templates)
            Q-->F
        end
        subgraph Handle form
            F -- Submit -->G(Controller)
            G-->H(FormHandler)
            H-->|Persist|Z(FormDataHandler)
        end
    end
    G-.->ZZ(Redirect)
    style F fill:#f9f,stroke:#333,stroke-width:2px
    style Core fill:#fbfbea
</div>

### Controllers

`Controllers` in the back office receives http requests, and when handling requests for creating or editing an entity, they instanciate and uses several concepts.

### FormBuilder

In most situations, the first component instanciated by the `Controller` is the `FormBuilder`. 
The `FormBuilder` will build the required `Form` with all `Form Types`, and retrieve data from the `FormDataProvider`. 

### FormDataProvider

The `FormDataProvider` is in charge of retrieving data from the `Database` to fill the form (when editing), and provide default data (when creating and editing). 

### Form Types

Developers can already use a large list of field types ([see Symfony types](https://symfony.com/doc/4.4/reference/forms/types.html)) that comes from the Symfony framework. In addition to that, PrestaShop adds more reusable field types that developers can use.

A complete reference of PrestaShop form types can be found [here]({{< relref "/8/development/components/form/types-reference">}}). 

### FormHandler

The `FormHandler` is responsible of:

- extracting the form data, 
- triggering the `actionBeforeCreate<FormName>FormHandler`, `actionBeforeUpdate<FormName>FormHandler`, `actionAfterCreate<FormName>FormHandler` and `actionAfterUpdate<FormName>FormHandler` hooks
- calling the `FormDataHandler`
- returning a `FormHandlerResult` 

### FormDataHandler

The `FormDataHandler` is responsible of persisting the data to `Database`, by sending a `CQRS command` to the `command bus`. 

{{% notice note %}}
This page is about Migrated `Forms` with `Symfony` and `CQRS pattern`. 

There are several ways to persist data, such as using [Doctrine entities]({{<relref "/8/modules/concepts/doctrine/#using-doctrine">}}), using [ObjectModel entities]({{<relref "/8/development/components/database/objectmodel">}}), or using [CQRS concepts]({{<relref "/8/development/architecture/domain/cqrs">}}) or not.
{{% /notice %}}

### Form Theme

To render forms in a clean and user friendly way, PrestaShop extended Symfony's [Bootstrap 4 Form Theme][sf-bootstrap4-form-theme] to create **PrestaShop UI Kit Form theme**. Learn more on [Symfony Form theme for PrestaShop]({{< relref "/8/development/components/form/form-theme/form-theme">}})

## Customize forms by modules

### Concepts 

- `FormModifier` - Allows to modify the `Form`, mostly for modules
- `FormModifier` hook_ - Allows to connect the `FormModifier` to the Form
- `FormDataProviderData` hook - Allows to provide data to the form
- `FormDataProviderDefaultData` hook - Allows to provide default data to the form
- `FormHandler hook` - Allows to handle the form and its data with modules

<div class='mermaid'>
graph
    AA(Http Request)-.->A
    subgraph Core
        subgraph Admin Theme
            K(Form Theme)
        end
        subgraph Render Form
            A(Controller)-->O(FormBuilder)
            O-->|1|M(FormDataProvider)
            M-->|2|O
            O-->|3|P(Form)
            P-->F(Rendered Form)
            K-->F
            A-->Q(Form Templates)
            Q-->F
        end
        subgraph Handle Form
            F -- Submit -->G(Controller)
            G-->H(FormHandler)
            H-->|"Persist"|Z(FormDataHandler)
        end
    end
    subgraph Module
        I(FormModifier) -->S(FormModifier hook)
        S -.-> O
        H -.-> J(FormHandler hooks)
        T(FormDataProviderDefaultData hook) -.-> M
        U(FormDataProviderData hook) -.-> M
    end
    G-.->ZZ(Redirect)
    style F fill:#f9f,stroke:#333,stroke-width:2px
    style Module fill:#dcedfc
    style Core fill:#fbfbea
</div>

### FormModifier

A `FormModifier` (or `FormBuilderModifier`) allows you to modify the content of a `Form`, in a module for example, to add, modify or remove an element. 

It as been implemented in an example module: [DemoProductForm2](https://github.com/PrestaShop/example-modules/blob/master/demoproductform2/src/Form/Modifier/ProductFormModifier.php). 

```php
namespace PrestaShop\Module\DemoProductForm\Form\Modifier;
[...]

final class ProductFormModifier
{
    public function __construct(
        private readonly TranslatorInterface $translator,
        private readonly FormBuilderModifier $formBuilderModifier
    ) {
    }

    public function modify(
        ?ProductId $productId,
        FormBuilderInterface $productFormBuilder
    ): void {
        [...]        
    }
```

```yml
services:
    PrestaShop\Module\DemoProductForm\Form\Modifier\ProductFormModifier:
        autowire: true
        public: true
        arguments:
            $formBuilderModifier: '@form.form_builder_modifier'
```

#### FormModifier hook

The `FormModifier`, without being hooked to a `Form` will have no effect. The `FormModifier` must be hooked by implementing [action&lt;Object&gt;FormBuilderModifier]({{<relref "/8/modules/concepts/hooks/list-of-hooks/action<FormName>FormBuilderModifier">}}).

In the module, register the hook and implement the method, for example, for the `Customer` entity: 

```php
public function install()
{
    $this->registerHook('actionProductFormBuilderModifier');
}

public function hookActionProductFormBuilderModifier(array $params): void
{
    /** @var ProductFormModifier $productFormModifier */
    $productFormModifier = $this->get(ProductFormModifier::class);
    $productId = isset($params['id']) ? new ProductId((int) $params['id']) : null;

    $productFormModifier->modify($productId, $params['form_builder']);
}
```

### FormDataProviderDefaultData Hook

The [`Action<FormName>FormDataProviderDefaultData` hook]({{<relref "/8/modules/concepts/hooks/list-of-hooks/action<FormName>FormDataProviderDefaultData">}}) allows your module to provide or modify the default values sent to forms. 

```php
public function install()
{
    $this->registerHook('actionProductFormDataProviderDefaultData');
}

public function hookActionProductFormDataProviderDefaultData(array $params): void
{
    // define default values for fields in $params["data"]
}
```

This hook has been implemented as an example in our [modules examples repository - demoformdataproviders](https://github.com/PrestaShop/example-modules/tree/master/demoformdataproviders).

### FormDataProviderData Hook

The [`Action<FormName>FormDataProviderData` hook]({{<relref "/8/modules/concepts/hooks/list-of-hooks/action<FormName>FormDataProviderData">}}) allows your module to provide or modify the values sent to forms. 

```php
public function install()
{
    $this->registerHook('actionProductFormDataProviderData');
}

public function hookActionProductFormDataProviderData(array $params): void
{
    // change value of fields in $params["data"]
}
```

This hook has been implemented as an example in our [modules examples repository - demoformdataproviders](https://github.com/PrestaShop/example-modules/tree/master/demoformdataproviders).

### FormHandler hook

The `FormHandler` hooks allows to receive the `Form` data, and make operations with this data to persist it.

4 hooks are available to achieve this: 

| Hook | Description |
| --- | --- |
| `actionBeforeCreate<FormName>FormHandler` | Triggered on **creation** of an IdentifiableObject, **before** persisting it to Database |
| `actionBeforeUpdate<FormName>FormHandler` | Triggered on **update** of an IdentifiableObject, **before** persisting it to Database |
| `actionAfterCreate<FormName>FormHandler` | Triggered on **creation** of an IdentifiableObject, **after** persisting it to Database |
| `actionAfterUpdate<FormName>FormHandler` | Triggered on **update** of an IdentifiableObject, **after** persisting it to Database |

<div class="mermaid">
graph TD
    subgraph "Update"
        BA(actionBeforeUpdate<strong>FormName</strong>FormHandler) --> BB(IdentifiableObject updated)
        BB --> BC(actionAfterUpdate<strong>FormName</strong>FormHandler)
    end  
    subgraph "Create"
        A(actionBeforeCreate<strong>FormName</strong>FormHandler) --> B(IdentifiableObject created)
        B --> C(actionAfterCreate<strong>FormName</strong>FormHandler)
    end
</div>

It as been implemented in an example module: [DemoProductForm](https://github.com/PrestaShop/example-modules/blob/master/demoproductform/demoproductform.php).

```php
public function hookActionAfterUpdateCombinationFormFormHandler(array $params): void
{
    $combinationId = $params['form_data']['id'];
    [...]
}
```

## Examples

You can find some examples about how to use forms in your modules to extend PrestaShop capacities: 

| Subject | Link |
| --- | --- |
| Extend a Symfony form in a module with upload image field | [Tutorial]({{<relref "/8/modules/sample-modules/extending-sf-form-with-upload-image-field" >}}) |
| Extending the new product page form | [Tutorial]({{<relref "/8/modules/sample-modules/extend-product-page" >}}) |
| Add action in grid to modify customers | [Tutorial]({{<relref "/8/modules/sample-modules/grid-and-identifiable-object-form-hooks-usage" >}}) |

[sf-bootstrap4-form-theme]: https://symfony.com/doc/4.4/form/bootstrap4.html
