---
title: DBQuery class
aliases:
  - /1.7/development/database/dbquery/
---

# The DBQuery class

The DBQuery class is a query builder which helps you create SQL queries. For instance:

```php
$sql = new DbQuery();
$sql->select('*');
$sql->from('cms', 'c');
$sql->innerJoin('cms_lang', 'l', 'c.id_cms = l.id_cms AND l.id_lang = '.(int)$id_lang);
$sql->where('c.active = 1');
$sql->orderBy('position');
return Db::getInstance()->executeS($sql);
```

## Main methods

{{% funcdef %}}

__toString()
: 
    Generate and get the query.

build()
: 
    Generate and get the query (return a string).

from(string $table, mixed $alias = null)
: 
    Set table for FROM clause.

groupBy(string $fields)
: 
    Add a GROUP BY restriction.

having(string $restriction)
: 	
    Add a restriction in the HAVING clause (each restriction will be separated by an AND statement).

innerJoin(string $table, string $alias = null, string $on = null)
:  
    Add a INNER JOIN clause<br>
    E.g. `$this->innerJoin('product p ON ...')`.

join(string $join)
:   
    Add a JOIN clause<br>
    E.g. `$this->join('RIGHT JOIN'.DB_PREFIX.'produc t p ON ...');`.

leftJoin(string $table, string $alias = null, string $on = null)
: 
    Add a LEFT JOIN clause.

leftOuterJoin(string $table, string $alias = null, string $on = null)
: 
    Add a LEFT OUTER JOIN clause.

limit(string $limit, mixed $offset = 0)
: 
    Limit results in query.

naturalJoin(string $table, string $alias = null)
: 
    Add a NATURAL JOIN clause.

orderBy(string $fields)
: 
    Add an ORDER BY restriction.

select(string $fields)
:  
    Add fields in query selection.

where(string $restriction)
:  
    Add a restriction in WHERE clause (each restriction will be separated by an AND statement).

{{% /funcdef %}}
