---
title: ObjectModel class
---

# The ObjectModel class

## Introduction

ObjectModel class is one of the main pillar of Prestashop's core. ObjectModel is the Data Access Layer for PrestaShop, implemented following the Active Record pattern. The Data Access Layer (DAL) is a part (with the Database Abstraction Layer - DBAL) of the Object Relational Mapping (ORM) system for PrestaShop.

Read more about Object relation mapping (ORM), Database abstraction layer (DBAL), Data access layer (DAL), and Active Record :

- [Object relational mapping (ORM)](https://en.wikipedia.org/wiki/Object%E2%80%93relational_mapping)
- [Database abstraction layer (DBAL)](https://en.wikipedia.org/wiki/Database_abstraction_layer)
- [Data access layer (DAL)](https://en.wikipedia.org/wiki/Data_access_layer)
- [Active record pattern](https://en.wikipedia.org/wiki/Active_record_pattern)

A class extending ObjectModel class is tied to a database table. A static attribute (`$definition`) is representing the model. 

Its instances are tied to database records. The ObjectModel class provides accessors for each attribute. 

When instancied with an id passed to the class constructor, the attributes are set with the related database record content (using the id as a primary key). 

When the `save()` method is called, ObjectModel will ask the DBAL to insert or update the object to database, depending if the id (reflection of the primary key in database), is known or not in the ObjectModel.

ObjectModel is also in charge of deleting an object in database (with its `delete()` method).

An ObjectModel extended class can be overriden, but with extreme precaution : defining a wrong `$definition` model for example, can break the entire system, or can lead to data loss. 

## Create a new entity managed by ObjectModel

You can create a new entity (in a module for example), with its own database table, managed by ObjectModel. 

To do this, extend you class with "ObjectModel" :

```php
use PrestaShop\PrestaShop\Adapter\Entity\ObjectModel; // not sure if i should namespace/use the adapter in this example or just use ObjectModel; ?

class Cms extends ObjectModel {

}
```

Next step is to define your model.

## Defining the model

To define your model (reflection of the database table structure, fields, type, ...), you must use the `$definition` static variable.

For instance:

```php
/**
 * Example from the CMS model (CMSCore)
 */
public static $definition = [
    'table' => 'cms',
    'primary' => 'id_cms',
    'multilang' => true,
    'fields' => array(
        'id_cms_category'  => ['type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'],
        'position'         => ['type' => self::TYPE_INT],
        'active'           => ['type' => self::TYPE_BOOL],

        // Language fields
        'meta_description' => [
            'type' => self::TYPE_STRING,
            'lang' => true,
            'validate' => 'isGenericName',
            'size' => 255
        ],
        'meta_keywords'    => [
            'type' => self::TYPE_STRING,
            'lang' => true,
            'validate' => 'isGenericName',
            'size' => 255
        ],
        'meta_title'       => [
            'type' => self::TYPE_STRING,
            'lang' => true,
            'validate' => 'isGenericName',
            'required' => true,
            'size' => 128
        ],
        'link_rewrite'     => [
            'type' => self::TYPE_STRING,
            'lang' => true,
            'validate' => 'isLinkRewrite',
            'required' => true,
            'size' => 128
        ],
        'content'          => [
            'type' => self::TYPE_HTML,
            'lang' => true,
            'validate' => 'isString',
            'size' => 3999999999999
        ],
    )
];
```

Let's analyse this definition :

```php
public static $definition = [
    'table' => 'cms',
    'primary' => 'id_cms',
    'multilang' => true,
    'fields' => array(
```

- `table` is the related database table name (without the database table `PREFIX`, usually `ps_`), 
- `primary` is the name of the `PRIMARY KEY` field in the database table, which will be used as `$id` in the ObjectModel
- `multilang` is a boolean value indicating that the entity is available in multiple langages, see [Multiple stores and/or languages]({{< ref "#multiple-stores-languages" >}})
- `fields` is an array containing all other of the fields from the database table.

### Fields description

A field is defined by a key (its name in the database table) and an array of description of its settings. 

```php
'meta_description' => [
    'type' => self::TYPE_STRING,
    'lang' => true,
    'validate' => 'isGenericName',
    'size' => 255
],
```

In this example :

- `meta_description` is the field's name
- `self::TYPE_STRING` is its type
- `lang` is a boolean related to multilang features ([Multiple stores and/or languages]({{< ref "#multiple-stores-languages" >}}))
- `validate` is a validation rule (optional)
- `size` is the max size of the field. It should match the database definition to avoid data cropping or overflow when inserting/updating objects.

#### Field types reference

Field type is an important setting, it determines how ObjectModel will format your data.

<table>
    <thead>
        <tr>
            <th>Type in ObjectModel</th>
            <th>Related type in MySQL</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>TYPE_INT</td>
            <td>INTEGER, INT, SMALLINT, TINYINT, MEDIUMINT, BIGINT, ...</td>
        </tr>
        <tr>
            <td>TYPE_BOOL</td>
            <td>SMALLINT</td>
        </tr>
        <tr>
            <td>TYPE_STRING</td>
            <td>VARCHAR</td>
        </tr>
        <tr>
            <td>TYPE_FLOAT</td>
            <td>FLOAT, DOUBLE</td>
        </tr>
        <tr>
            <td>TYPE_DATE</td>
            <td>DATE</td>
        </tr>
        <tr>
            <td>TYPE_HTML</td>
            <td>BLOB, TEXT</td>
        </tr>
        <tr>
            <td>TYPE_NOTHING</td>
            <td>Should not be used (avoids ObjectModel formating)</td>
        </tr>
        <tr>
            <td>TYPE_SQL</td>
            <td>Should not be used</td>
        </tr>
    </tbody>
</table>

#### Validation rules reference

Several validation rules are available for your ObjectModel fields. 
Please refer to the Validate class of PrestaShop [here](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Validate.php) for a complete list.

## Basic usage of an ObjectModel managed entity

### Create a new object

```php
$cms = new Cms();
$cms->position = 2;
$cms->meta_title = "My awesome CMS title";
[...]
$cms->save();
```

In this example, we create an entity from scratch. Then, we set its `position` and `meta_title` attribute, and we call the `save()` method. The `save()` method will trigger the `add()` method since its `id` attribute is not yet known (because the entity is not created in database).

If the insert was successful, the ObjectModel class will set the id of the entity (retrieved from database). [Complete reference here](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/ObjectModel.php#L572-L658).


### Load an object

```php
$id = 2; // id of the entity in database
$cms = new Cms($id); 
$cms->meta_title = "My awesome CMS title with an update";
[...]
$cms->save();
```

In this example, we retrieve an entity from the database, with its id. Then, we change its `meta_title` attribute, and we call the same `save()` method. The `save()` method will trigger the `update()` method and not the `add()` method since its `id` attribute is known.

### Delete an object

```php
$id = 2; // id of the entity in database
$cms = new Cms($id); 
$cms->delete();
```

In this example, we retrieve an entity from the database, with its id. Then, we trigger the `delete()` method. 

## Multiple stores and/or languages {#multiple-stores-languages}

In order to retrieve an object in many languages:

```php
'multilang' => true
```

In order to retrieve an object depending on the current store:

```php
'multishop' => true
```

In order to retrieve an object which depends on the current store, and in many languages:

```php
'multilang_shop' => true
```

## ObjectModel lifecycle and hooks

Thanks to the hooks, you can alter the Object Model or execute functions during the lifecycle of your models. Every hook receive an instance of the manipulated object model:

{{< figure src="../../../img/object-model-lifecycle.png" title="ObjectModel lifecycle" >}}

As an example, this is how you can retrieve information about a product when we delete it from the database:

```php
use Product;
// In a module

public function hookActionObjectProductDeleteAfter(Product $product)
{
    PrestaShopLogger::addLog(
        sprintf('Product with id %s was deleted with success', $product->id_product)
    );    
}
```
