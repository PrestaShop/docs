---
title: PrestaShopCollection class
---

# The PrestaShopCollection component

## Introduction

The PrestaShopCollection component is a Collection of ObjectModel objects. It implements common useful `PHP` interfaces: 

- `Iterator`: allows for `foreach` loop on the Collection
- `ArrayAccess`: allows for offset/index access on the Collection
- `Countable`: allow for `count()` function to be used on the Collection

It eases fetching / filtering selections of ObjectModel objects.

```php
use PrestaShopCollection;

$productCollection = (new PrestaShopCollection('Product'))
    ->where('on_sale', '=', true)
    ->orderBy('reference', 'desc')
    ->setPageSize(100);

if (count($productCollection) > 0) {
    foreach ($productCollection as $product) {
        // do something with your product
    }
}
```

## Create a PrestaShopCollection

To create a PrestaShopCollection, simply instantiate a PrestaShopCollection with the ObjectModel type as a constructor parameter. 

```php
use PrestaShopCollection;

$productCollection = new PrestaShopCollection('Product');
```

A second parameter is available to set the ID of the language to use (`$id_lang`). It is `null` by default.

```php
use PrestaShopCollection;

$idLang = 1;
$productCollection = new PrestaShopCollection('Product', $idLang);
```

{{% notice note %}}
Using `$id_lang` parameter will allow setting a Context language when querying/filtering multi-lang fields. If not set, multi-lang fields will be returned as an `array` in the Collection.
{{% /notice %}}

## Get results, count results

When your collection is created, you may need to get its content. Several methods are available to retrieve its content:

- `getFirst()`: gets the first item of the Collection
- `getLast()`: gets the last item of the Collection
- you can also access items via their index key, or iterate with `foreach`

```php
$productCollection = new PrestaShopCollection('Product');

$firstProduct = $productCollection->getFirst();
$lastProduct = $productCollection->getLast();

// you can access items in the collection by index, like in a regular array (this class implements ArrayAccess). The index starts at 0
$thirdProduct = $productCollection[2]; 

// The collection is also iterable (the class implements Iterator): 
foreach ($productCollection as $product) {

}

// Or you can use the count() function (the class implements Countable):
count($productCollection);
```

## Filtering a Collection (where, having)

When building the Collection, you may need to filter its content. To do so, use the `where()` method. 

```php
public function where($field, $operator, $value, $method = 'where')
```

- `$field` is the field's name to filter
- `$operator` is the operator to use for filtering (complete list below)
- `$value` is the value to filter against (can be a scalar or array value)
- `$method` is the method to use (defaults to `where`, or can be `having`, see below for more informations) 

### List of operators

| Operator | SQL equivalent | Accept |
| --- | --- | --- |
| = | = | Scalar, Array |
| in | IN | Array |
| != | != | Scalar, Array |
| &lt;> | != | Scalar, Array |
| notin (or NOTIN) | NOT IN | Scalar, Array |
| > | > | Scalar |
| >= | >= | Scalar |
| &lt; | &lt; | Scalar |
| &lt;= | &lt;= | Scalar |
| like (or LIKE) | LIKE | Scalar |
| notlike (or NOTLIKE) | NOT LIKE | Scalar |
| regexp (or REGEXP) | REGEXP | Scalar |
| notregexp (or NOTREGEXP) | NOT REGEXP | Scalar |

### Examples of usage

```php
$productCollection = new PrestaShopCollection('Product');
$productCollection->where('on_sale', '=', true); // find products on sale
```

```php
$productCollection = new PrestaShopCollection('Product');
$productCollection->where('reference', 'LIKE', 'REF-%'); // find products with reference beginning by "REF-"
```

### `Having` method

There is also `having()` method available, which calls `where()` with the parameter `$method` set to `having`. 

```php
public function having($field, $operator, $value)
```

## Joining to associated entities (join)

When building the Collection, you may need to join with other ObjectModel entities. 
You can join on associations that are declared in the $definition of the ObjectModel. 

```php
public function join($association, $on = '', $type = null)
```

Join `manufacturer` to your `Product` collection: 

```php
$productCollection = new PrestaShopCollection('Product');
$productCollection->join('manufacturer');
```

You can join on a different field by specifying the field name as a second parameter: 

```php
$productCollection = new PrestaShopCollection('Product');
$productCollection->join('categories', 'id_category');
```

By default, a `LEFT JOIN` will be used. `INNER JOIN` or `LEFT OUTER JOIN` are also available using the third parameter:

```php
$productCollection->join('categories', 'id_category', PrestaShopCollection::LEFT_JOIN);
$productCollection->join('categories', 'id_category', PrestaShopCollection::INNER_JOIN);
$productCollection->join('categories', 'id_category', PrestaShopCollection::LEFT_OUTER_JOIN);
```

### Using `where` with `join`

One of the interest of joining other ObjectModel entities to your collection, is the possibility to filter on the external entity with `where()`. 

```php
$productCollection = (new PrestaShopCollection('Product'))
    ->join('manufacturer')
    ->where('manufacturer.name', '=', 'Manufacturer AAA');
```

## Ordering a Collection (order by)

To order your collection, use the `orderBy()` method. 

```php
public function orderBy($field, $order = 'asc')
```

Ordering can be done in ascending or descending directions, with `asc` or `desc` in the `$order` parameter.

```php
$productCollection = (new PrestaShopCollection('Product'))
    ->orderBy('reference', 'desc');
```

## Grouping (group by)

If you want to organize your collection items based on a specific field, you can make use of the `groupBy()` method.

```php
public function groupBy($field)
```

```php
$productCollection = (new PrestaShopCollection('Product'))
    ->groupBy('id_supplier');
```

## Paginating a Collection (offset / limit)

If you need to retrieve a large number of items, it may be necessary to use pagination techniques such as SQL's `OFFSET/LIMIT`. This will help you manage your collection more efficiently.

To do so, use these two methods:

```php
public function setPageNumber($page_number)
public function setPageSize($page_size)
```

First, set the $page_size:

```php
$productCollection = (new PrestaShopCollection('Product'))
    ->setPageSize(100); // will get only 100 items
```

If `$page_size` is set, the collection will return the first `$page_size` items. 

If you need to paginate and access the second page of a collection, you can use the following example:

```php
$productCollection = (new PrestaShopCollection('Product'))
    ->setPageSize(100) // will get only 100 items
    ->setPageNumber(2); // but from page 2, equivalent to offset=(pageNumber - 1) * page_size. 
```

- Getting the page: `1` of a collection with a page_size of: `100` is the `PrestaShopCollection` equivalent of this `SQL` statement: 
    `LIMIT 100` or `LIMIT 100 OFFSET 0` or `LIMIT 0,100`

- Getting the page: `2` of a collection with a page_size of: `100` is the `PrestaShopCollection` equivalent of this `SQL` statement: 
    `LIMIT 100 OFFSET 100` or `LIMIT 100,100`

- Getting the page: `3` of a collection with a page_size of: `100` is the `PrestaShopCollection` equivalent of this `SQL` statement: 
    `LIMIT 100 OFFSET 200` or `LIMIT 200,100`

{{% notice info %}}
Known issue: If the entity has multi-lang attributes, when not using `$id_lang` in the `PrestaShopCollection` constructor, and using pagination (`setPageSize()`, `setPageNumber()`), pagination will be broken. 
Please set an `$id_lang` in the constructor to use pagination features for entities with multi-lang attributes.
{{% /notice %}}