---
title: Db class
weight: 1
---

# Using the database with the Db class

## Get link to the database

```php
<?php
/**
 * @var \Db $db
 */
$db = \Db::getInstance();
```

The first call to this method initialize the link to the database, and return the same link to all the next calls.
`$db` in this example will be reused in all the next examples.

## Db class methods

### Execute a raw SQL request (SELECT only)

```php
<?php
$request = 'SELECT `id_table` FROM `' . _DB_PREFIX_ . 'some_table` ...';

/** @var array $result */
$result = $db->executeS($request);
```

As the method deals with raw SQL requests, the `_DB_PREFIX_` must be used.

The result is an associative array, containing an array for each row.

### Execute a raw SQL request (SELECT only) and get the first row

```php
<?php
$request = "SELECT `id_table` FROM `' . _DB_PREFIX_ . 'some_table` ...";

/** @var array $result */
$result = $db->getRow($request);
```

As the method deals with raw SQL requests, the `_DB_PREFIX_` must be used.

Returns an associative array containing the first row of the query.
This function automatically adds "LIMIT 1" to the query.

### Execute a SELECT request with only one column and one row

```php
<?php
$request = "SELECT `count('sales')` FROM `' . _DB_PREFIX_ . 'some_table` ...";

/** @var string|false $salesCount */
$salesCount = $db->getValue($request);
```

As the method deals with raw SQL requests, the `_DB_PREFIX_` must be used.

This method is convenient when you need only one value to retrieve from the database.
It prevent to loop in several arrays in order to get the first value of the first row.

### Execute a raw SQL request (UPDATE, INSERT...)

```php
<?php
$request = "INSERT INTO `' . _DB_PREFIX_ . 'some_table` (`id_table`) VALUES (10)";

/** @var array|false */
$db->execute($request);
```

Return an array if the request was properly executed, false otherwise.

### Insert a row in the database

```php
<?php
/** @var bool $result */
$result = $db->insert('db_table', array(
    'id_lang' => (int) $lang,
    'value' => pSQL($value),
    'date_upd' => date('Y-m-d H:i:s'),
));
```

`_DB_PREFIX_` will be automatically prefixed to the table name.

The result is boolean saying if the request was properly executed or not.

### Update a row in the database

```php
<?php
/** @var bool $result */
$result = $db->update('db_table', array(
    'value' => pSQL($value),
    'date_upd' => date('Y-m-d H:i:s'),
), 'id_table = 10', 1, true);
```

`_DB_PREFIX_` will be automatically prefixed to the table name.

The result is boolean saying if the request was properly executed or not.
