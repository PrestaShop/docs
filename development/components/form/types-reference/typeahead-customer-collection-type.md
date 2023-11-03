---
title: TypeaheadCustomerCollectionType
---

# TypeaheadCustomerCollectionType

This form class is responsible for selecting a customer.

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [TypeaheadCustomerCollectionType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/TypeaheadCustomerCollectionType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

- [ProductSpecificPrice](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Product/ProductSpecificPrice.php#L209-L224)

```php
$builder->add(
    'sp_id_customer',
    TypeaheadCustomerCollectionType::class,
    [
        // "%QUERY" is appended to url in order to avoid "%" sign being encoded into "%25",
        // it used as a placeholder to replace with actual query in JS
        'remote_url' => $this->router->generate('admin_customers_search', ['sf2' => 1]) . '&customer_search=%QUERY',
        'mapping_value' => 'id_customer',
        'mapping_name' => 'fullname_and_email',
        'placeholder' => $this->translator->trans('All customers', [], 'Admin.Global'),
        'template_collection' => '<div class="media-body"><div class="label">%s</div><i class="material-icons delete">clear</i></div>',
        'limit' => 1,
        'required' => false,
        'label' => $this->translator->trans('Add customer', [], 'Admin.Catalog.Feature'),
    ]
)
```

## Preview example

{{< figure src="../img/typeahead-customer-collection-type.png" title="TypeaheadCustomerCollectionType rendered in form using textarea" >}}