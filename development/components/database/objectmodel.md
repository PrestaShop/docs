---
title: ObjectModel class
useMermaid: true
---

# The ObjectModel class

## Introduction

ObjectModel class is one of the main pillar of Prestashop's core. ObjectModel is the Data Access Layer for PrestaShop, implemented following the Active Record pattern. The Data Access Layer (DAL) is a part (with the Database Abstraction Layer - DBAL) of the Object Relational Mapping (ORM) system for PrestaShop.

Read more about Object relation mapping (ORM), Database abstraction layer (DBAL), Data access layer (DAL), and Active Record :

- [Object relational mapping (ORM)](https://en.wikipedia.org/wiki/Object%E2%80%93relational_mapping)
- [Database abstraction layer (DBAL)](https://en.wikipedia.org/wiki/Database_abstraction_layer)
- [Data access layer (DAL)](https://en.wikipedia.org/wiki/Data_access_layer)
- [Active record pattern](https://en.wikipedia.org/wiki/Active_record_pattern)

A class extending ObjectModel class is tied to a database table. Its static attribute (`$definition`) is representing the model. 

Its instances are tied to database records. The ObjectModel class provides accessors for each attribute. 

When instancied with an `$id` passed to the class constructor, the attributes are set with the related database record content (using the `$id` as a primary key). 

When the `save()` method is called, ObjectModel will ask the DBAL to **insert** or **update** the object to database, depending if the `$id` is known or not in the ObjectModel.

ObjectModel is also in charge of deleting an object in database (with its `delete()` method).

{{% notice info %}}
An ObjectModel extended class can be overriden, but with extreme precaution : defining a wrong `$definition` model for example, can break the entire system, or can lead to data loss. 
{{% /notice %}}

## Create a new entity managed by ObjectModel

You can create a new entity (in a module for example), with its own database table, managed by ObjectModel. 

To do this, extend you class with "ObjectModel" :

```php
use PrestaShop\PrestaShop\Adapter\Entity\ObjectModel;

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
- `multilang` is a boolean value indicating that the entity is available in multiple langages, see [Multiple languages]({{< ref "#multiple-languages" >}})
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
- `lang` is a boolean related to multilang features ([Multiple languages]({{< ref "#multiple-languages" >}}))
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
[Please refer to the Validate class of PrestaShop](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Validate.php) for a complete list.

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
$id = 2; // id of the object in database
$cms = new Cms($id); 
$cms->meta_title = "My awesome CMS title with an update";
[...]
$cms->save();
```

In this example, we retrieve an entity from the database, with its id. Then, we change its `meta_title` attribute, and we call the same `save()` method. The `save()` method will trigger the `update()` method and not the `add()` method since its `id` attribute is known. [Complete reference here](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/ObjectModel.php#L750-L868).

### Hard or soft delete an object

Two delete mecanisms are available with ObjectModel : hard delete and soft delete. 
Hard-delete deletes the record from the database, while soft-delete sets a flag to database indicating that this record is deleted.

{{% notice info %}}
**Soft delete is not always available.**

If the model object has no `deleted` property or no `deleted` definition field, a `PrestaShopException` will be thrown
{{% /notice %}}

{{% notice info %}}
**Soft delete does not trigger DeleteHooks.**

Soft deleting an object does not trigger **Delete** related hooks, but will trigger **Update** related hooks. [ObjectModel lifecycle hooks]({{< ref "#lifecycle-hooks" >}})
{{% /notice %}}

```php
$id = 2; // id of the object in database
$cms = new Cms($id); 
$cms->softDelete(); // sets the deleted property to true, and triggers an update() call
[...]
$cms->delete(); // triggers a DELETE statement to the DBAL
```

## Advanced usage 

### Multiple languages objects{#multiple-languages}

{{% notice %}}
todo
{{% /notice %}}

### Multiple stores objects{#multiple-stores}

{{% notice %}}
todo
{{% /notice %}}

### Duplicate an object

{{% notice %}}
todo
{{% /notice %}}

### Partial update of an object

Since {{< minver v="8.x" >}}, a partial update mecanism is available in ObjectModel. This mecanism allows you to choose which attributes you want to update during the `update()` method call. 

On previous versions ({{< minver v="1.7.x" >}}, {{< minver v="1.6.x" >}}, ...), this method was already available but was not properly working.

Example :

```php
$cms = new Cms(2); 
$cms->meta_title = "My awesome CMS title with an update";
$cms->meta_description = "My updated description";
$cms->setFieldsToUpdate(["meta_title" => true]);
$cms->save();
```

In this example, only the `meta_title` will be updated. `meta_description` (and all other fields) will not be updated in database.

### Toggle status

A mecanism of state is available with ObjectModel : active / inactive state. 
When triggered, this mecanism allows your entities to be enabled / disabled. 

{{% notice info %}}
**Status is not always available.**

If the model object has no `active` property or no `active` definition field, a `PrestaShopException` will be thrown
{{% /notice %}}

```php
$id = 2; // id of the entity in database
$cms = new Cms($id); 
$cms->toggleStatus(); // sets the active property to true or false (depending on its current value), and triggers an update() call
```

### Delete multiple entities

You can delete multiple object at once with the `deleteSelection` method. Pass an array of IDs to delete to this method, and they will be deleted. 

Usage : 

```php
$cmsIdsToDelete = [1, 2, 3, 8, 10];
(new Cms())->deleteSelection($cmsIdsToDelete);
```

### Associate an object to a store (context)

When working with multi-store ObjectModels, you can associate an object to one or several stores with the `associateTo` method :

```php
$cms->associateTo(1); // associates the object to the store #1
[...]
$cms->associateTo([1, 2, 4]); // associates the object to the stores #1, #2 and #4
```

## ObjectModel lifecycle and hooks{#lifecycle-hooks}

Thanks to the hooks, you can alter the Object Model or execute functions during the lifecycle of your models. Every hook receive an instance of the manipulated object model:

{{% mermaid %}}
graph TD
   subgraph "DELETE"
        deleteA(actionObject<strong>DeleteBefore</strong>) --> deleteB(actionObject<i>Classname</i><strong>DeleteBefore</strong>) --> deleteC(actionObject<strong>DeleteAfter</strong>) --> deleteD(actionObject<i>Classname</i><strong>DeleteAfter</strong>)
    end
    subgraph "UPDATE"
        updateA(actionObject<strong>UpdateBefore</strong>) --> updateB(actionObject<i>Classname</i><strong>UpdateBefore</strong>) --> updateC(actionObject<strong>UpdateAfter</strong>) --> updateD(actionObject<i>Classname</i><strong>UpdateAfter</strong>)
    end
     subgraph "CREATE"
        createA(actionObject<strong>AddBefore</strong>) --> createB(actionObject<i>Classname</i><strong>AddBefore</strong>) --> createC(actionObject<strong>AddAfter</strong>) --> createD(actionObject<i>Classname</i><strong>AddAfter</strong>)
    end
{{% /mermaid %}}

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
