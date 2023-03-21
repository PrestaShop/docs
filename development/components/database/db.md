---
title: Db class
---

# Using the database with the Db component

## Initialize connection to database

```php
/** @var \Db $db */
$db = \Db::getInstance();
```

The first call to this method initializes the link to the database, and return the same link to all the next calls. `$db` in this example will be reused in all the next examples.

### Read-only "slave" server

In some cases, you might encounter this alternative:

```php
$db = Db::getInstance(_PS_USE_SQL_SLAVE_);
```

If PrestaShop's database user allows the use of MySQL slave servers in its architecture, then this last instance's connection can be done on the slave servers.
You should only use the `PS_USE_SQL_SLAVE` argument when making read-only queries (`SELECT`, `SHOW`, etc.), and only if these do not need a result to be immediately updated with a result. If you make a query on a table right after inserting data in that same table, you should make that query on the master server.

## Db class methods

{{% notice note %}}
**Security notice:**

To prevent SQL injection, make sure variables used in queries are correctly escaped:

* cast with `(int)` for integers
* use `pSQL()` for strings

The `bqSQL()` function can also be used. Note that it escapes the ``` ` ``` character, then it calls `pSQL()`.
{{% /notice %}}

### Execute a raw SQL SELECT query

```php
$request = 'SELECT `id_table` FROM `' . _DB_PREFIX_ . 'some_table` ...';

/** @var array $result */
$result = $db->executeS($request);
```

As the method deals with raw SQL requests, the `_DB_PREFIX_` must be used.

The result is an array of associative arrays, containing an array for each row.
It should only be used for read only queries: SELECT, SHOW, etc.

#### Retrieving only the first row: getRow()

Using getRow() method will retrieve the first row of your query:

```php
$request = "SELECT `id_table` FROM `' . _DB_PREFIX_ . 'some_table` ...";

/** @var array $result */
$result = $db->getRow($request);
```

As the method deals with raw SQL requests, the `_DB_PREFIX_` must be used.

Returns an associative array containing the first row of the query.
This function automatically adds "LIMIT 1" to the query.

#### Retrieving only a single value

```php
$request = "SELECT `count('sales')` FROM `' . _DB_PREFIX_ . 'some_table` ...";

/** @var string|false $salesCount */
$salesCount = $db->getValue($request);
```

As the method deals with raw SQL requests, the `_DB_PREFIX_` must be used.

This method is convenient if you want to retrieve only one value from the database.

It avoids to loop in several arrays in order to get the first value of the first row.

### Get the number of rows in a result

```php
$db->numRows();
```

This method caches and returns the number of rows from the last result set. 

Be careful, if your request has a limit, the method `numRows()` is limited too. If you need to retrieve the number of rows without limits, you need to use `SELECT COUNT(*)`.

### Get the number of affected rows

```php
$db->Affected_Rows();
```

Returns the number of rows impacted by the latest `INSERT`, `UPDATE`, `REPLACE` or `DELETE` query.

### Execute a raw SQL request (UPDATE, INSERT...)

```php
$request = "INSERT INTO `' . _DB_PREFIX_ . 'some_table` (`id_table`) VALUES (10)";

/** @var bool $result */
$result = $db->execute($request);
```

Return true if the request was properly executed, false otherwise.

### Insert a row in the database

```php
/** @var bool $result */
$result = $db->insert('db_table', [
    'id_lang' => (int) $lang,
    'value' => pSQL($value),
    'date_upd' => date('Y-m-d H:i:s'),
]);
```

`_DB_PREFIX_` will be automatically prefixed to the table name.

The result is a boolean whose state indicates if the request was properly executed or not.

##### Parameters:

`$table`
: Table's name. The PrestaShop prefix is automatically inserted, you do not have to put it in.

`$data`
: The data array, containing the data to be inserted, with name as keys and data as values.

`$null_values`
: If true, then values that are passed as `NULL` will be inserted as such in the database.

`$use_cache`
: If false, PrestaShop's cache management is disabled during this query. Do not change this parameter unless you knew exactly what you are doing.

`$type`
: If you wish to change the insertion, this parameter can take the following constants: `Db::INSERT`, `Db::INSERT_IGNORE` or `Db::REPLACE`.

`$add_prefix`
: If false, table prefix will not be automatically added to the table name.

### Insert multiple rows in the database (batch insert)

```php
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

The result is a boolean whose state indicates if the request was properly executed or not.


### Update row(s) in the database

```php
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
/** @var bool $result */
$result = $db->delete('db_table', 'id_table = 10');
```

Method signature: `delete($table, $where = '', $limit = 0, $use_cache = true, $add_prefix = true)`

`_DB_PREFIX_` will be automatically prefixed to the table name if `$add_prefix` is `true` (by default).

The result is boolean saying if the request was properly executed or not.
