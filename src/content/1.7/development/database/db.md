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

The result is an array of associative arrays, containing an array for each row.
It should only be used for read only queries: SELECT, SHOW, etc.

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

### Gets the number of rows in a result
```php
$db->numRows();
```
This method caches and returns the number of rows from the last result set. 
Be careful, if your request has a limit, the method `numRows()` doesn't return the total rows. If you need, you have to make a `SELECT COUNT(*)`.

### Gets the number of affected rows
```php
$db->Affected_Rows();
```
returns the number of rows impacted by the latest INSERT, UPDATE, REPLACE or DELETE query.

### Execute a raw SQL request (UPDATE, INSERT...)

```php
<?php
$request = "INSERT INTO `' . _DB_PREFIX_ . 'some_table` (`id_table`) VALUES (10)";

/** @var bool $result */
$result = $db->execute($request);
```

Return true if the request was properly executed, false otherwise.

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

### Insert multiple rows in the database (batch insert)

```php
<?php
$now = date('Y-m-d H:i:s');
/** @var bool $result */
$result = $db->insert(
    'db_table',
    [
        [
            'name' => 'John Doe',
            'email' => 'john.doe@email.com',
            'date_add' => $now,
        ],
        [
            'name' => 'Jane Doe',
            'email' => 'jane.doe@email.com',
            'date_add' => $now,
        ],
    ]
);
```
This will execute the `INSERT` SQL command only once.

`_DB_PREFIX_` will be automatically prefixed to the table name.

The result is boolean saying if the request was properly executed or not.


### Update row(s) in the database

```php
<?php
/** @var bool $result */
$result = $db->update('db_table', array(
    'value' => pSQL($value),
    'date_upd' => date('Y-m-d H:i:s'),
), 'id_table = 10', 1, true);
```
Method signature: `update($table, $data, $where = '', $limit = 0, $null_values = false, $use_cache = true, $add_prefix = true)`

`_DB_PREFIX_` will be automatically prefixed to the table name if `$add_prefix` is `true` (by default).

The result is boolean saying if the request was properly executed or not.

### Delete rows in the database

```php
<?php
/** @var bool $result */
$result = $db->delete('db_table', 'id_table = 10');
```
Method signature: `delete($table, $where = '', $limit = 0, $use_cache = true, $add_prefix = true)`

`_DB_PREFIX_` will be automatically prefixed to the table name if `$add_prefix` is `true` (by default).

The result is boolean saying if the request was properly executed or not.

### Security

To prevent SQL injection, make sure variables used in queries are correctly escaped: 
 * cast with `(int)` for integers
 * use `pSQL()` for strings
The `bqSQL()` function can also be used. Note that it escapes the ``` ` ``` character, then it calls `pSQL()`.
