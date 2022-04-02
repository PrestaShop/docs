---
title: Filter types reference
menuTitle: Filter types reference
weight: 13
---

## Filter types reference

Filter types are actually Symfony Form types used in the grid to filter columns. Each filter must be associated to a column present in the definition using the `setAssociatedColumn` function present in all Filter types.

### SearchAndResetType

Usually inserted at last this button submit the POST filtering request, it then display a reset button to clear all the filters.

| Properties         | Expected value(s)                  |
|--------------------| -----------------------------------|
| **Options**        | `reset_route`                      |
|                    | `reset_route_params`               |
|                    | `redirect_route`                   |
|                    | `redirect_route_params`            |
| **Defaults**       | `reset_route` => null              |
|                    | `reset_route_params` => []         |
|                    | `redirect_route` => null           |
|                    | `redirect_route_params` => []      |
| **Allowed Types**  | `reset_route` (string, null)       |
|                    | `reset_route_params` => []         |
|                    | `redirect_route` => (string, null) |
|                    | `redirect_route_params` => []      |

### CountryChoiceType

Builds a country selector, it contains various options, but they are automatically filled with the list of country.

| Properties         | Expected value(s)               |
|--------------------| --------------------------------|
| **Options**        | `choices`                       |
|                    | `choice_attr`                   |
|                    | `with_dni_attr`                 |
|                    | `with_postcode_attr`            |
| **Defaults**       | `choices` => []                 |
|                    | `choice_attr` => []             |
|                    | `with_dni_attr` => boolean      |
|                    | `with_postcode_attr` => boolean |
| **Allowed Types**  | `choices` => []                 |
|                    | `choice_attr` => []             |
|                    | `with_dni_attr` => boolean      |
|                    | `with_postcode_attr` => boolean |

### DateRangeType

Input adapted for date columns to select a range of dates (from/to).

| Properties         | Expected value(s)             |
|--------------------| ------------------------------|
| **Options**        | `date_format`                 |
| **Defaults**       | `date_format` => 'YYYY-MM-DD' |
| **Allowed Types**  | `date_format` => string       |

### YesAndNoChoiceType

Input adapted for boolean columns that adds a toggle button.

| Properties         | Expected value(s)                                 |
|--------------------| --------------------------------------------------|
| **Options**        | `choices`                                         |
| **Defaults**       | `choices` => ['Yes' => 1, 'No' => 0] (translated) |
| **Allowed Types**  | `choices` => []                                   |

### ProfileChoiceType

Builds a selector for Employee's profile type, it contains various options but they are automatically filled with the list of profiles.

| Properties         | Expected value(s)             |
|--------------------| ------------------------------|
| **Options**        | `choices`                     |
| **Defaults**       | `choices` => []               |
| **Allowed Types**  | `choices` => []               |

## Use case example

```php
<?php
// /modules/my-module/src/Grid/MyGridDefinitionFactory.php
namespace MyModule\Grid;

use PrestaShop\PrestaShop\Core\Grid\Definition\Factory\AbstractGridDefinitionFactory;
use PrestaShop\PrestaShop\Core\Grid\Filter\Filter;
use PrestaShop\PrestaShop\Core\Grid\Filter\FilterCollection;
use PrestaShopBundle\Form\Admin\Type\SearchAndResetType;
use PrestaShopBundle\Form\Admin\Type\YesAndNoChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * How to define the Grid filters?
 * You can adapt this example or look at the existing ones
 * in PrestaShop Core.
 */
class MyGridDefinitionFactory extends AbstractGridDefinitionFactory
{
        /**
         * {@inheritdoc}
         */
        protected function getFilters()
        {
            return (new FilterCollection())
                ->add(
                    (new Filter('id_category', TextType::class))
                        ->setAssociatedColumn('id_category')
                        ->setTypeOptions([
                            'required' => false,
                            'attr' => [
                                'placeholder' => $this->trans('Search ID', [], 'Admin.Actions'),
                            ],
                        ])
                )
                ->add(
                    (new Filter('name', TextType::class))
                        ->setAssociatedColumn('name')
                        ->setTypeOptions([
                            'required' => false,
                            'attr' => [
                                'placeholder' => $this->trans('Search name', [], 'Admin.Actions'),
                            ],
                        ])
                )
                ->add(
                    (new Filter('description', TextType::class))
                        ->setAssociatedColumn('description')
                        ->setTypeOptions([
                            'required' => false,
                            'attr' => [
                                'placeholder' => $this->trans('Search description', [], 'Admin.Actions'),
                            ],
                        ])
                )
                ->add(
                    (new Filter('active', YesAndNoChoiceType::class))
                        ->setAssociatedColumn('active')
                )
                ->add(
                    (new Filter('actions', SearchAndResetType::class))
                        ->setAssociatedColumn('actions')
                        ->setTypeOptions([
                            'reset_route' => 'admin_common_reset_search_by_filter_id',
                            'reset_route_params' => [
                                'filterId' => self::GRID_ID,
                            ],
                            'redirect_route' => 'admin_monitorings_index',
                        ])
                );
        }
}
```

{{% notice note %}}
If you need more information about filtering grid you can read [how to work with search form]({{< ref "/1.7/development/components/grid/tutorials/work-with-search-form/" >}}).
{{% /notice %}}
