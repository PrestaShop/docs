---
title: Database structure
weight: 4
---

# Maintaining the database

## Database structure definition

### Global definition

The database structure of PrestaShop can be found in `install/data/db_structure.sql` ([9.0.x releases example](https://github.com/PrestaShop/PrestaShop/blob/9.1.x/install-dev/data/db_structure.sql)).

It is used one time, during the installation of PrestaShop.
It contains the structure of almost all tables. If a table needs to be added or
modified, this the file you should open.

### Table in DB but not in db_structure.sql

Some tables are now linked to [Doctrine](https://www.doctrine-project.org/) entities
(i.e stocks). If their `ObjectModel` (= legacy) equivalent does not exist,
the entity is probably only managed by Doctrine.

In that case, updating the table can be done by modifying the related entity
stored in `src/PrestaShopBundle/Entity/`.

## Database content

The default database content is stored in XML files in `install/data/xml/`.
There is one file per entity (= table). XML files are structured following ObjectModel structure.

These files are used during the PrestaShop installation as well.

Another file is being used to load data during the install process: `install/data/db_data.sql`. Some versions of PrestaShop do not use it so you might not always find it in the ZIP archive.

## Structure and content updates

### Defining changes

Once PrestaShop is installed, the default structure and content files we saw are not used anymore.

If a new release of PrestaShop must bring changes to the existing database, an update file must be created along the `db_structure.sql` update. 
This SQL file will be stored in the [Update Assistant](https://github.com/PrestaShop/autoupgrade/tree/dev/upgrade/sql) module in the folder `/upgrade/sql/`.

Its name is the PrestaShop version on which the change will be applied.

For instance, here is the file *[9.0.0.sql](https://github.com/PrestaShop/autoupgrade/blob/dev/upgrade/sql/9.0.0.sql)*,
used by stores updating to 9.0.0 or later:

```sql
[...]
SET SESSION sql_mode='';
SET NAMES 'utf8mb4';

INSERT INTO `PREFIX_configuration` (`name`, `value`, `date_add`, `date_upd`) VALUES
    ('PS_DEBUG_COOKIE_NAME', '', NOW(), NOW()),
    ('PS_DEBUG_COOKIE_VALUE', '', NOW(), NOW()),
    ('PS_SEPARATOR_FILE_MANAGER_SQL', ';', NOW(), NOW()),
    ('PS_PRODUCT_BREADCRUMB_CATEGORY', 'default', NOW(), NOW()),
    ('PS_SEARCH_FUZZY_MAX_DIFFERENCE', 5, NOW(), NOW())
;
[...]
/* PHP:ps_900_set_url_lang_prefix(); */;
[...]
```

In there we can read the SQL queries to execute when updating to 9.0.0.
Each of them alters the structure and/or modify the existing data.
In case you have complex algorithms to run, you can call PHP code with the
`PHP:` keyword.

To make the code callable, a dedicated file has to be created in
`/upgrade/php/` with a function in it. This file and function must have
the same name as we saw in the SQL update file.

If we reuse the previous example, we will find the corresponding file *[/upgrade/php/ps_900_set_url_lang_prefix.php](https://github.com/PrestaShop/autoupgrade/blob/dev/upgrade/php/ps_900_set_url_lang_prefix.php)*:

```php
<?php
function ps_900_set_url_lang_prefix()
{
  // Code inserting or updating values in database
  [...]
}
```

PrestaShop does not expect these functions to return anything. It will always
consider it was run without failure.

### Applying changes

Applying the changes is covered in [the update page]({{< ref "/9/basics/keeping-up-to-date/update" >}}).
