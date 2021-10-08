---
title: PositionColumn reference
menuTitle: PositionColumn
weight: 20
---

# PositionColumn Type

This column type allows you to define rows position using a drag and drop feature. Besides this column definition
you need to use our javascript `PositionExtension` and prepare a route to manage the positions update. To help you create
this controller you can use our [PositionUpdater][position-updater-reference] component.

## Available options

| Properties   | Type   | Expected value                                                                                |
| ------------ | ------ | --------------------------------------------------------------------------------------------- |
| **id_field** | string | **required** The record field containing its id.                                              |
| **position_field** | string | **required** The record field containing its position.                                  |
| **update_route** | string | **required** The route called to update records position.                                 |
| **update_method** | string | **default:** `GET` The HTTP method used to call the update route.                        |
| **record_route_params** | array | **default:** `[]` An associative array to inject record fields in the update route. |

## Example usage

```php
<?php
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\PositionColumn;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;

$positionColumn = new PositionColumn('position');
$positionColumn->setName('Position');
$positionColumn->setOptions([
     'id_field' => 'id_link_block',
     'position_field' => 'position',
     'update_route' => 'admin_link_block_update_positions',
     'update_method' => 'POST',
     'record_route_params' => [
         'id_hook' => 'hookId',
     ],
]);

$columns = new ColumnCollection();
$columns->add($positionColumn);
```

```js
import Grid from '../../components/grid/grid';
import PositionExtension from "../../components/grid/extension/position-extension";

const $ = window.$;

$(() => {
  let gridDivs = document.querySelectorAll('.js-grid');
  gridDivs.forEach((gridDiv) => {
      const grid = new Grid(gridDiv.dataset.gridId);
      grid.addExtension(new PositionExtension());
  });
});
```

[actions-reference]: {{< ref "/8/development/components/grid/actions-reference/" >}}
[position-updater-reference]: {{< ref "/8/development/components/position-updater/" >}}
