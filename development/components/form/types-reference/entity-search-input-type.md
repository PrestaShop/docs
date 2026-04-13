---
title: EntitySearchInputType
---

# EntitySearchInputType

This form type is used for an OneToMany (or ManyToMany) association, it allows to search a list of entities (based on a remote URL) and associate it. It is based on the CollectionType form type which provides prototype features to display a custom template for each associated item.

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [EntitySearchInputType](https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Form/Admin/Type/EntitySearchInputType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |
| min_length | integer | 3 | Minimum number of characters required before triggering the search.
| remote_url | string | none | Overrides the default search endpoint with a custom URL.
| filtered_identities | array | [] | List of entity IDs that must be excluded from the search results.
| limit | integer | 1 | The number of items to display.

## Required Javascript components

| Component                                                            | Description                         |
|:---------------------------------------------------------------------|:------------------------------------|
| EntitySearchInput | Handles the search input, AJAX calls, and product selection logic. |

{{% notice note %}}
Learn more about [JavaScript components and how to use them]({{<relref "/9/development/components/global-components">}})
{{% /notice %}}

## Code example

- [RedirectOptionType](https://github.com/PrestaShop/PrestaShop/blob/9.1.0/src/PrestaShopBundle/Form/Admin/Sell/Category/SEO/RedirectOptionType.php#L66-L76)

```php
$builder
    ->add('target', EntitySearchInputType::class, [
        'required' => false,
        'limit' => 1,
        'min_length' => 3,
        'label' => false,
        'remote_url' => $this->router->generate('admin_categories_get_ajax_categories', ['query' => '__QUERY__']),
        'placeholder' => $this->trans('To which category should the page redirect?', 'Admin.Catalog.Help'),
        'filtered_identities' => [$options['id_category'], $this->homeCategoryId],
    ]);
```

In your template, the PrestaShop UI Kit must be added as your `form_theme`, from the `.twig` file or directly from the controller.

```twig
{% form_theme form '@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit.html.twig' %}
```

Then in Javascript you have to connect `EntitySearchInput` component.

```js
const elementId = $("#form_prefix_field_name");

let searchInput = new window.prestashop.component.EntitySearchInput(elementId, {
    onRemovedContent: () => {
      console.log("Event on product deletion");
    },
    onSelectedContent: () => {
      console.log("Event on product selection");
    },
});
```

## Preview example

{{< figure src="../img/entity-search-input-type.png" title="EntitySearchInputType rendered in form example" >}}
