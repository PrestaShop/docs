---
title: Database
weight: 15
---

## Accessing the database

### The database structure

By default, PrestaShop’s database tables start with the `ps_` prefix. This can be customized during installation

All table names are in lowercase, and words are separated with an underscore character (“_”):

* ps_employee
* ps_manufacturer
* ps_product
* ps_product_comment
* ps_shop_url

When a table establishes the links between two entities, the names of both entities are mentioned in the table’s name. For instance, `ps_category_product` links products to their category.

A few details to note about tables:

* Tables which contain translations must end with the `_lang` suffix. For instance, `ps_product_lang` contains all the translations for the `ps_product` table.
* Tables which contain the records linking to a specific shop must end with the `_shop` suffix. For instance, `ps_category_shop` contains the position of each category depending on the store.

There is also a couple of standard practices for data rows within a table:

* Use the `id_lang` field to store the language associated with a record.
* Use the `id_shop` field to store the store associated with a record.

### The DBQuery class

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

Here are some of the methods from this class:

<dl class="function-definition">
	<dt>__toString()</dt>
	<dd>Generate and get the query.</dd>
	
	<dt>build()</dt>
	<dd>Generate and get the query (return a string).</dd>
	
	<dt>from(string $table, mixed $alias = null)</dt>
	<dd>Set table for FROM clause.</dd>
    
  <dt>groupBy(string $fields)</dt> 
  <dd>Add a GROUP BY restriction.</dd>
  
  <dt>having(string $restriction)</dt>	
  <dd>Add a restriction in the HAVING clause (each restriction will be separated by an AND statement).</dd>
  
  <dt>innerJoin(string $table, string $alias = null, string $on = null)</dt> 
  <dd>
    Add a INNER JOIN clause<br>
    E.g. <code>$this->innerJoin('product p ON ...')</code>.
  </dd>
  
  <dt>join(string $join)</dt> 
  <dd>
    Add a JOIN clause<br>
    E.g. <code>$this->join('RIGHT JOIN'.DB_PREFIX.'produc t p ON ...');</code>.
  </dd>
  
  <dt>leftJoin(string $table, string $alias = null, string $on = null)</dt> 
  <dd>Add a LEFT JOIN clause.</dd>
  
  <dt>leftOuterJoin(string $table, string $alias = null, string $on = null)</dt> 
  <dd>Add a LEFT OUTER JOIN clause.</dd>
  
  <dt>limit(string $limit, mixed $offset = 0)</dt> 
  <dd>Limit results in query.</dd>
  
  <dt>naturalJoin(string $table, string $alias = null)</dt> 
  <dd>Add a NATURAL JOIN clause.</dd>
  
  <dt>orderBy(string $fields)</dt> 
  <dd>Add an ORDER BY restriction.</dd>
  
  <dt>select(string $fields)</dt> 
  <dd>Add fields in query selection.</dd>
  
  <dt>where(string $restriction)</dt> 
  <dd>Add a restriction in WHERE clause (each restriction will be separated by an AND statement).</dd>
</dl>