---
title: ChoiceColumn reference
menuTitle: ChoiceColumn
weight: 10
---

# ChoiceColumn Type

The `ChoiceColumn` is used to display a dropdown select field within a grid row, allowing users to change values directly from the grid without navigating to an edit page. When a user selects a different option, an AJAX call is triggered to update the value via the specified route.

This column type is particularly useful for status fields where quick changes are common, such as order status or ticket status.

## Available options

| Properties           | Type                                    | Expected value                                                                                         |
| -------------------- | --------------------------------------- | ------------------------------------------------------------------------------------------------------ |
| **field**            | string, int, or bool                    | **required** The record field name that identifies the current value.                                  |
| **route**            | string                                  | **required** The route used for the AJAX call when a choice is selected.                               |
| **choice_provider**  | ConfigurableFormChoiceProviderInterface | **required** Provider that supplies the available choices for the dropdown.                            |
| **color_field**      | string                                  | The record field name that contains the color value for visual indication. Default: empty string.      |
| **record_route_params** | array                                | Parameters mapping for the route. Maps route parameter names to record field names. Default: `[]`.     |

## Example usage

```php
<?php

use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\ChoiceColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;

$choiceColumn = new ChoiceColumn('status');
$choiceColumn->setName('Status');
$choiceColumn->setOptions([
    'field' => 'current_state',
    'route' => 'admin_orders_list_update_status',
    'choice_provider' => $this->orderStatesChoiceProvider,
    'color_field' => 'color',
    'record_route_params' => [
        'id_order' => 'orderId',
    ],
]);

$columns = new ColumnCollection();
$columns->add($choiceColumn);
```

## Real-world examples

### Order status in Orders grid

```php
<?php

use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\ChoiceColumn;

->add((new ChoiceColumn('osname'))
    ->setName($this->trans('Status', [], 'Admin.Global'))
    ->setOptions([
        'field' => 'current_state',
        'route' => 'admin_orders_list_update_status',
        'color_field' => 'color',
        'choice_provider' => $this->orderStatesChoiceProvider,
        'record_route_params' => [
            'id_order' => 'orderId',
        ],
    ])
)
```

### Customer thread status

```php
<?php

use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\ChoiceColumn;

->add(
    (new ChoiceColumn('status'))
        ->setName($this->trans('Status', [], 'Admin.Global'))
        ->setOptions([
            'field' => 'status',
            'route' => 'admin_customer_threads_list_update_status',
            'color_field' => 'status_color',
            'choice_provider' => $this->customerThreadStatusesChoiceProvider,
            'record_route_params' => [
                'id_customer_thread' => 'customerThreadId',
            ],
        ])
)
```

## Creating a choice provider

The `choice_provider` option requires an implementation of `ConfigurableFormChoiceProviderInterface`. Here's an example:

```php
<?php

namespace PrestaShop\PrestaShop\Core\Form\ChoiceProvider;

use PrestaShop\PrestaShop\Core\Form\ConfigurableFormChoiceProviderInterface;

class OrderStatesChoiceProvider implements ConfigurableFormChoiceProviderInterface
{
    public function getChoices(array $options): array
    {
        // Return choices as ['Label' => 'value'] pairs
        return [
            'Awaiting payment' => 1,
            'Payment accepted' => 2,
            'Shipped' => 4,
            'Delivered' => 5,
        ];
    }
}
```

## Required JavaScript component

The `ChoiceColumn` requires the **ChoiceExtension** to handle form submission when a user selects a new value. Add it to your grid:

```javascript
const $ = window.$;

$(() => {
  const myGrid = new window.prestashop.component.Grid('my_grid_id');
  myGrid.addExtension(new window.prestashop.component.GridExtensions.ChoiceExtension());
});
```

The route specified in the `route` option must handle POST requests. The selected value is sent as a `value` parameter in the request body.
