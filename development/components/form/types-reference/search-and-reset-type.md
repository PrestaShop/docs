---
title: SearchAndResetType
---

# SearchAndResetType

FormType used in rendering of "Search and Reset" action in Grids.

- Namespace: PrestaShopBundle\Form\Admin\Type
- Reference: [SearchAndResetType](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Type/SearchAndResetType.php)

## Type options

| Option       | Type   | Default value                     | Description                                                                               |
| :----------- | :----- | :-------------------------------- | :---------------------------------------------------------------------------------------- |

## Code example

- [AddressGridDefinitionFactory](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Grid/Definition/Factory/AddressGridDefinitionFactory.php#L238-L248)

```php
->add(
    (new Filter('actions', SearchAndResetType::class))
        ->setAssociatedColumn('actions')
        ->setTypeOptions([
            'reset_route' => 'admin_common_reset_search_by_filter_id',
            'reset_route_params' => [
                'filterId' => self::GRID_ID,
            ],
            'redirect_route' => 'admin_addresses_index',
        ])
)
```
