---
title: How to modify an existing Grid in a module
menuTitle: Modify an existing Grid in a module
weight: 5
---

{{< minver v="1.7.5.1" title="true" >}}

# How to modify an existing Grid in a module

If you need to modify an existing Grid, like inverting two columns for instance, this is really easy to do it in a module thanks to the available hooks.

## Business use case

In this tutorial, we will try to improve the user experience of the Customers listing Grid (this page will be available in 1.7.6).

Thinking about it, we could improve the current grid to highlight business-driven information:

* we could remove the "Social title", not really interesting if our business is not "gender" specific,
* we could remove the "Partner offers" column, as it doesn't bring any useful information,
* and also remove the "Active" column, for the same reason;

We could also add a new column about the number of orders per customer and re-organize a little bit all the columns.

Let's see together how to do that with PrestaShop.

## Removing columns and filters from a Grid

Thanks to the available hooks, it's super easy to remove columns from a grid!

As stated in the documentation, for each grid with the id {id} a list of hooks is available to alter the grid.

First, we will use the hook able to alter the **Definition** of the grid: the Definition is a specific object where we define:

* the columns,
* the filters,
* the grid actions,
* and the grid bulk actions;

We need to register a hook into a module (let's name it `customers` for the sake of the example).

The Customers Grid id is "customer", you can find this information in the associated class: `CustomerGridDefinitionFactory`.

```php
<?php
/**
 * Hooks allows to modify Customer grid definition.
 * This hook is a right place to add/remove columns or actions (bulk, grid).
 *
 * @param array $params
 */
public function hookActionCustomerGridDefinitionModifier(array $params)
{
    /** @var GridDefinitionInterface $definition */
    $definition = $params['definition'];

    /** @var ColumnCollection */
    $columns = $definition->getColumns();
}
```

Once we have registered the hook, we can alter the columns:

* remove the existing ones,
* add new ones,
* and position them precisely;

```php
<?php
/** @var ColumnCollection */
$columns = $definition->getColumns();
$columns->remove('social_title')
    ->remove('active')
    ->remove('optin')
;
```

Afer the activation of the module, the grid should looks like this:

![grid-tuto1](https://user-images.githubusercontent.com/1247388/52344104-33516780-2a1a-11e9-8f88-b299c6e444f7.png)

It's not really nice... because we also need to delete the related search filters!

Let's do that:

```php
<?php
/** @var FilterCollection $filters */
$filters = $definition->getFilters();

$filters->remove('social_title')
    ->remove('active')
    ->remove('optin')
;
```

And this time, our grid is awesome!

![grid-tuto-2](https://user-images.githubusercontent.com/1247388/52344105-33516780-2a1a-11e9-9ec8-96427561be15.png)

## Re-ordering grid columns and filters

When adding a new column, it's super easy to position it in a grid.

The `ColumnCollection` class have two functions for that:

* `addAfter($columnId, ColumnInterface $column)`
* `addBefore($columnId, ColumnInterface $column)`

If you need to insert a new column "$newColumn" after a specific column with the id "name", this is how you can do that:

```php
<?php
$newColumn = new DataColumn('example') ...
$columns->addAfter('name', $newColumn);
```

The operation is **more difficult** with an existing column. We need to remove and add it again to the right position:

```php
<?php
$columns->remove('the_column_we_need_to_move');

$columnWeNeedToMove = new ... // we create the column
$columns->addBefore('sales', $columnWeNeedToMove);
```

### Re-ordering filters?

There is a good news here: filters are linked to the columns thanks to the function `setAssociatedColumn` of the `FilterInterface` contract.

This means that you don't need to re-order filters when you re-order columns: great!

If you don't define a new filter when creating a new column, you won't be able to search using this column as a filter.

But... what if you want to make this column searchable as most of the existing ones?

Also, you may wondering at this moment how PrestaShop is able to fill the column data?

## Fill the column data and configure the filter

Each grid is defined by a Definition and a Grid Query Builder.

The Grid Query Builder have the responsibility of providing two query builders: the `Search query builder` and the `Count query builder`.

With these query builders, the Grid Query Builder is able to retrieve and filter data from the database to fill the columns of the Grid using the filters criterion.

Thanks to the Count query builder, the pagination system works out of the box so you don't need to implement your own.

Using a hook, we can alter both of them to - for example - retrieve new information and fill a new column.

### QueryBuilder configuration

We want to retrieve the number of orders for each customer.

To alter the QueryBuilder, we have a hook named `action{GridId}GridQueryBuilderModifier`. This is how you can fill the column data to retrieve the number of orders from a customers:

```php
<?php
public function hookActionCustomerGridQueryBuilderModifier(array $params)
{
    $searchQueryBuilder = $params['search_query_builder'];

    $searchQueryBuilder->addSelect('COUNT(o.id_order) as nb_orders')
        ->from(_DB_PREFIX_.'orders o')
    ;

    $countQueryBuilder = $params['count_query_builder'];

    // So the pagination and the number of customers
    // retrieved will be right.
    $countQueryBuilder->addSelect('COUNT(o.id_order) as nb_orders')
        ->from(_DB_PREFIX_.'orders o')
    ;
}
```

{{% notice note %}}
The result column name (here `nb_orders`) must be the same of the `field` option of the related column: this is how the mapping of data works.
{{% /notice %}}

Once the new hook is registered and the module activated, you should see the "Customers" grid customized according to the use cases we have listed in the introduction: great!
