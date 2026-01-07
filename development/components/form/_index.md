---
title: Forms with Symfony
menuTitle: Form
useMermaid: true
---

# Forms with Symfony

## Introduction

Symfony's `Forms` system separates the construction, rendering, and processing of forms. This involves multiple key concepts, including form creation, data provision, validation, data persistence from submitted forms, and form rendering.

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

`Controllers` in the back office receive HTTP requests. When handling requests for creating or editing an entity, they instantiate and utilize several concepts.

### FormBuilder

In most scenarios, the Controller initially instantiates the FormBuilder. This component constructs the necessary Form, incorporating all Form Types. It also retrieves data from the FormDataProvider, ensuring that the form is populated with the appropriate data.
The `FormBuilder` will build the required `Form` with all `Form Types`, and retrieve data from the `FormDataProvider`.

### FormDataProvider

The FormDataProvider is responsible for retrieving data from the Database. This data is used to populate the form when editing an existing entity. Additionally, it provides default values for the form fields, both when creating a new entity and when editing an existing one.

[Learn more about CRUD forms and FormDataProviders]({{<relref "/9/development/architecture/migration-guide/forms/CRUD-forms#creating-a-form-data-provider">}}).

### Form Types

Developers have access to a wide range of field types ([see Symfony types](https://symfony.com/doc/4.4/reference/forms/types.html)) that come from the Symfony framework. Additionally, PrestaShop enhances this selection with its own reusable field types.

A complete reference of PrestaShop form types can be found [here]({{< relref "/9/development/components/form/types-reference">}}).

### FormHandler

The `FormHandler` is responsible of:

- extracting the form data,
- triggering the `actionBeforeCreate<FormName>FormHandler`, `actionBeforeUpdate<FormName>FormHandler`, `actionAfterCreate<FormName>FormHandler` and `actionAfterUpdate<FormName>FormHandler` hooks
- calling the `FormDataHandler`
- returning a `FormHandlerResult`

### FormDataHandler

The `FormDataHandler` is tasked with persisting data to the Database. It accomplishes this by dispatching a CQRS command to the command bus, ensuring efficient and effective data handling.

{{% notice note %}}
This page focuses on migrated Forms utilizing Symfony and the CQRS pattern.

It's important to note that data can be persisted in several ways, including: [Doctrine entities]({{<relref "/9/modules/concepts/doctrine/#using-doctrine">}}), using [ObjectModel entities]({{<relref "/9/development/components/database/objectmodel">}}), or using [CQRS concepts]({{<relref "/9/development/architecture/domain/cqrs">}}).
{{% /notice %}}

### Form Theme

To render forms in a clean and user-friendly way, PrestaShop extended Symfony's [Bootstrap 4 Form Theme][sf-bootstrap4-form-theme] to create **PrestaShop UI Kit Form theme**. Learn more on [Symfony Form theme for PrestaShop]({{< relref "/9/development/components/form/form-theme/form-theme">}})

## Customize forms by modules

### Concepts

- `FormModifier`: This component is used to modify the Form, primarily for module integration.
- `FormModifier` hook_: Connects the FormModifier to the form, enabling modifications.
- `FormDataProviderData` hook: Facilitates the provision of specific data to the form.
- `FormDataProviderDefaultData` hook: Used for supplying default data to the form.
- `FormHandler hook`: Allows the module to handle the form and its data effectively.

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

A `FormModifier` (also known as `FormBuilderModifier`) allows you to alter the contents of a Form. It is particularly useful within modules, allowing developers to add, modify, or remove elements from the form as required.

It's been implemented in an example module: [DemoProductForm](https://github.com/PrestaShop/example-modules/blob/master/demoproductform/src/Form/Modifier/ProductFormModifier.php).

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

A `FormModifier` by itself will not affect a `Form` unless it is properly hooked. To ensure functionality, the `FormModifier` must be linked by implementing the [action\<Object\>FormBuilderModifier]({{<relref "/9/modules/concepts/hooks/list-of-hooks/action<FormName>FormBuilderModifier">}}).

In the module, register the hook and implement the method, for example, for the `Product` entity:

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

The [`Action<FormName>FormDataProviderDefaultData` hook]({{<relref "/9/modules/concepts/hooks/list-of-hooks/action<FormName>FormDataProviderDefaultData">}}) allows your module to provide or modify the default values sent to forms.

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

This hook has been implemented as an example in our [example-modules repository](https://github.com/PrestaShop/example-modules/tree/master/demoformdataproviders).

### FormDataProviderData Hook

The [`Action<FormName>FormDataProviderData` hook]({{<relref "/9/modules/concepts/hooks/list-of-hooks/action<FormName>FormDataProviderData">}}) allows your module to provide or modify the values sent to forms.

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

This hook has been implemented as an example in our [example-modules repository - demoformdataproviders](https://github.com/PrestaShop/example-modules/tree/master/demoformdataproviders).

### FormHandler hook

The `FormHandler` hook is designed to intercept `Form` data, enabling the execution of various operations with this data. Its primary function is to facilitate the persistence of form data, ensuring that the data captured by the form can be effectively processed and stored later.

There are 4 hooks available to work with the `Form` data:

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

You can find some examples of how to use forms in your modules to extend PrestaShop capabilities:

| Subject | Link |
| --- | --- |
| Extend a Symfony form in a module with an upload field for image | [Tutorial]({{<relref "/9/modules/sample-modules/extending-sf-form-with-upload-image-field" >}}) |
| How to extend the new product page form | [Tutorial]({{<relref "/9/modules/sample-modules/extend-product-page" >}}) |
| How to modify Customers grid | [Tutorial]({{<relref "/9/modules/sample-modules/grid-and-identifiable-object-form-hooks-usage" >}}) |

[sf-bootstrap4-form-theme]: https://symfony.com/doc/4.4/form/bootstrap4.html
