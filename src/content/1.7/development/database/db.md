=========
Dedicated page for running SQL request with DB Class. Rewrite me
=========



Db methods
Parameters
Action
Return
getRow($sql, $use_cache)
string|DbQuery $sql the select query (without "LIMIT 1")
     
bool $use_cache Find it in cache first


Returns an associative array containing the first row of the query

This function automatically adds "LIMIT 1" to the query.
array
bool
object
null
execute($sql, $use_cache)
string|DbQuery $sql the select query (without "LIMIT 1")
     
bool $use_cache Find it in cache first


Executes a query
bool
executeS($sql, $array,  $use_cache)
string|DbQuery $sql Query to execute

bool $array Return an array instead of a result object (deprecated since 1.5.0.1, use query method instead)

bool $use_cache


Executes return the result of $sql as array.
 array
false
mysqli_result
PDOStatement
resource
null
getValue($sql,  $use_cache)
string|DbQuery $sql

bool $use_cache


Returns a value from the first row, first column of a SELECT query.
string
false
null
update($table, $data, $where, $limit, $null_values, $use_cache, $add_prefix)
string $table Table name without prefix

array $data Data to insert as associative array. If $data is a list of arrays, multiple insert will be done

string $where WHERE condition

int $limit

bool $null_values If we want to use NULL values instead of empty quotes

bool $use_cache

bool $add_prefix Add or not _DB_PREFIX_ before table name


Executes an UPDATE query.
bool
delete($table, $where, $limit, $use_cache, $add_prefix)
string $table Name of the table to delete

string $where WHERE clause on query

int $limit Number max of rows to delete

bool $use_cache Use cache or not

bool $add_prefix Add or not _DB_PREFIX_ before table name


Executes a DELETE query.
bool
update($table, $data, $where, $limit, $null_values, $use_cache, $add_prefix)
string $table Table name without prefix

array $data Data to insert as associative array. If $data is a list of arrays, multiple insert will be done

string $where WHERE condition

int $limit

bool $null_values If we want to use NULL values instead of empty quotes

bool $use_cache

bool $add_prefix Add or not _DB_PREFIX_ before table name
Executes an UPDATE query.
bool
escape($string, $html_ok, $bq_sql)
string $string SQL data which will be injected into SQL query

bool $html_ok Does data contain HTML code ? (optional)
bool $bq_sql
Sanitize data which will be injected into SQL query.
string Sanitized data
