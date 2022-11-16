---
title: ObjectModel class
useMermaid: true
---

# The ObjectModel class

## Introduction

ObjectModel class is one of the main pillars of PrestaShop's legacy core. While a complete migration to Symfony/Doctrine entities is planned in the roadmap, ObjectModel will remain present and available in our software for a while.

ObjectModel is the Data Access Layer for PrestaShop, implemented following the Active Record pattern. The Data Access Layer (DAL) is a part (with the Database Abstraction Layer - DBAL) of the Object Relational Mapping (ORM) legacy system for PrestaShop.

Read more about Object relation mapping (ORM), Database abstraction layer (DBAL), Data access layer (DAL), and Active Record:

- [Object relational mapping (ORM)](https://en.wikipedia.org/wiki/Object%E2%80%93relational_mapping)
- [Database abstraction layer (DBAL)](https://en.wikipedia.org/wiki/Database_abstraction_layer)
- [Data access layer (DAL)](https://en.wikipedia.org/wiki/Data_access_layer)
- [Active record pattern](https://en.wikipedia.org/wiki/Active_record_pattern)

A class extending the ObjectModel class is tied to a database table. Its static attribute (`$definition`) represents the model. 

Its instances are tied to database records. 

When instantiated with an `$id` in the class constructor, the attributes are retrieved from the related database record (using the `$id` as the primary key to find the table record). 

{{% notice info %}}
You can override classes that extend ObjectModel, but with extreme precaution, e.g., defining a wrong `$definition` model can break the entire system or lead to data loss. 
{{% /notice %}}

## Create a new entity managed by ObjectModel

You can create a new entity (in a module for example), with its own database table, managed by ObjectModel. 

To do this, create class extending the ObjectModel:

```php
class Cms extends ObjectModel
{

}
```

Next, define the properties of your entity :

```php
class Cms extends ObjectModel
{
    public $id_cms;
    public $id_cms_category;
    public $position;
    public $active;
    [...]
}
```

The next step is [defining the model]({{< ref "#defining-model" >}}).

## Defining the model{#defining-model}

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

Let's analyse this definition:

```php
public static $definition = [
    'table' => 'cms',
    'primary' => 'id_cms',
    'multilang' => true,
    'fields' => array(
```

- `table` is the related database table name (without the database table `PREFIX`), 
- `primary` is the name of the `PRIMARY KEY` field in the database table, which will be used as `$id` in the ObjectModel
- `multilang` is a boolean value indicating that the entity is available in multiple langages, see [Multiple languages]({{< ref "#multiple-languages" >}})
- `fields` is an array containing all other of the fields from the database table.

### Fields description

A field is defined by a key (its name in the database table) and an array of its settings. 

```php
'meta_description' => [
    'type' => self::TYPE_STRING,
    'lang' => true,
    'validate' => 'isGenericName',
    'size' => 255
],
```

In this example:

- `meta_description` is the field's name
- `self::TYPE_STRING` is its type
- `lang` is a boolean related to multilang features ([Multiple languages]({{< ref "#multiple-languages" >}}))
- `validate` is a validation rule (optional)
- `size` is the max size of the field. It should match the database definition to avoid data cropping or overflow when inserting/updating objects.

#### Field types reference

Field type is an important setting, it determines how ObjectModel will format your data.

| Type in ObjectModel | Related type in MySQL                                   | Formating                                             |
|---------------------|---------------------------------------------------------|-------------------------------------------------------|
| TYPE_INT            | INTEGER, INT, SMALLINT, TINYINT, MEDIUMINT, BIGINT, ... | Cast to int                                           |
| TYPE_BOOL           | SMALLINT                                                | Cast to int                                           |
| TYPE_STRING         | VARCHAR                                                 | Return string, escape value, remove php and html tags |
| TYPE_FLOAT          | FLOAT, DOUBLE                                           | Cast to float                                         |
| TYPE_DATE           | DATE                                                    | Return string, escape value, remove php and html tags |
| TYPE_HTML           | BLOB, TEXT                                              | Return string, escape value, keep safe html tags      |
| TYPE_NOTHING        |                                                         | Use with caution, not secure, does no formating       |
| TYPE_SQL            | BLOB, TEXT                                              | Return string, escape value, keep safe html tag       |

#### Validation rules reference

Several validation rules are available for your ObjectModel fields. 
[Please refer to the Validate class of PrestaShop](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Validate.php) for a complete list.

## Basic usage of an ObjectModel managed entity

### Create and save a new object

```php
$cms = new Cms();
$cms->position = 2;
...
$cms->save();
```

In this example, we create an entity from scratch. Then, we set its `position` attribute, and we call the `save()` method. The `save()` method will trigger the `add()` method since its `id` attribute is not yet known (because the entity is not created in database).

If the insert is successful, the ObjectModel class will set the entity's id (retrieved from the database). [Complete reference here](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/ObjectModel.php#L572-L658).


### Load and save an object

```php
$id = 2; // id of the object in database
$cms = new Cms($id); 
$cms->position = 3;
...
$cms->save();
```

In this example, we retrieve an entity from the database with its id. Then, we change its `position` attribute and call the same `save()` method. The `save()` method will trigger the `update()` method and not the `add()` method since its `id` attribute is known. [Complete reference here](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/ObjectModel.php#L750-L868).

### Hard or soft delete an object

Two delete mechanisms are available with ObjectModel: hard delete and soft delete. 
Hard-delete deletes the record from the database, while soft-delete sets a flag in the table's field indicating that this record is deleted.

{{% notice info %}}
**Soft delete is not always available.**

If the model object doesn't have a `deleted` property or there is no `deleted` field available in the class definition, a `PrestaShopException` will be thrown
{{% /notice %}}

{{% notice info %}}
**Soft delete does not trigger DeleteHooks.**

Soft deleting an object does not trigger **Delete** related hooks, but will trigger **Update** related hooks. [ObjectModel lifecycle hooks]({{< ref "#lifecycle-hooks" >}})
{{% /notice %}}

```php
$id = 2; // id of the object in database
$cms = new Cms($id); 
$cms->softDelete(); // sets the deleted property to true, and triggers an update() call
...
$cms->delete(); // triggers a DELETE statement to the DBAL
```

## Advanced usage 

### Multiple languages objects{#multiple-languages}

PrestaShop's ObjectModel can handle translations (also called internationalization, or i18n) of your objects.

#### Under the hood: how does it work?

When declaring a multi-language ObjectModel, PrestaShop will fetch another database table named like your base database table, but with a suffix `_lang`
This table references the id of the base Object (`id_cms`), the id of the language (`id_lang`), and each translatable field. 

In our previous example, for `Cms` ObjectModel:

<div class='mermaid'>
classDiagram
    ps_cms <|-- ps_cms_lang
    ps_cms : id_cms
    ps_cms : id_cms_category
    ps_cms : position
    ps_cms : active
    ps_cms : ...
    class ps_cms_lang {
        id_cms
        id_lang
        meta_title
        meta_description
        meta_keywords
        link_rewrite
        content
        ...
    }
</div>

#### Translate your ObjectModel entity

To do so, you must declare the `multilang` setting of your model definition to `true`:

```php
public static $definition = [
    ...
    'multilang' => true,
    ...
```

And then, you must declare which fields are available for translations:

```php
'fields' => array(
    ...
    'meta_description' => [
        ...
        'lang' => true,
        ...
    ],
    ...
)
```

#### Accessors for translatable ObjectModels{#multiple-language-accessors}

Translatable fields are available in your ObjectModel as `array`. 
In our example, to update the attributes `meta_title` for languages EN (`$lang_id=1`) and FR (`$lang_id=2`), use the following method :

```php
$cms->meta_title[1] = "My awesome title";
$cms->meta_title[2] = "Mon fabuleux titre";
$cms->save();
```

But... what if i want to retrieve my object only for a specific language, and update its `meta_title` ?
In this case, you can load your object with the `$id_lang` parameter in constructor, and you will have a non-array accessor :

```php
$cms = new Cms($cms_id, $lang_id);
$cms->meta_title = "Mon fabuleux titre";
$cms->save();
```

### Multiple stores/shops objects{#multiple-stores}

PrestaShop's ObjectModel can handle multiple stores (or multi shop) ObjectModels.

#### Under the hood: how does it work?

When declaring a multi-store ObjectModel, PrestaShop will fetch another database table named like your base database table, with a suffix `_shop`
This table is a pivot table referencing at least the id of the base Object (`id_cms`) and the id of the shop (`id_shop`). 

In our previous example, for `Cms` ObjectModel:

<div class='mermaid'>
classDiagram
    ps_cms <|-- ps_cms_shop
    ps_cms : id_cms
    ps_cms : id_cms_category
    ps_cms : position
    ps_cms : active
    ps_cms : ...
    class ps_cms_shop {
        id_cms
        id_shop
    }
</div>

#### Enable multi-shop for your entity

To do so, you must declare the `multishop` setting of your model definition to `true`:

```php
public static $definition = [
    ...
    'multishop' => true,
    ...
```

#### Associate an object to a store

You can associate an object to one or several stores with the `associateTo` method:

```php
$cms->associateTo(1); // associates the object to the store #1
...
$cms->associateTo([1, 2, 4]); // associates the object to the stores #1, #2 and #4
```

### Multiple stores/shops and languages objects{#multiple-stores-languages}

PrestaShop's ObjectModel can handle both multiple languages and multiple shop entities. The entity `Category` is a good example of this case:

- we need to translate a Category name for each language
- we may need to change the name of a Category for different shops

#### Under the hood: how does it work?

When declaring a multi-store ObjectModel, PrestaShop will fetch another database table named like your base database table, with a suffix `_shop`
This table is a pivot table referencing at least the id of the base Object (`id_cms`) and the id of the shop (`id_shop`). 

In our previous example, for `Category` ObjectModel :

<div class='mermaid'>
classDiagram
    ps_category <|-- ps_category_lang
    ps_category <|-- ps_category_shop
    ps_category : id_category
    ps_category : position
    ps_category : active
    ps_category : ...
    class ps_category_lang {
        id_category
        id_shop
        id_lang
        additional_description
        ...
    }
    class ps_category_shop {
        id_category
        id_shop
    }
</div>

#### Enable multi language + multi shop for your entity

To do so, you must declare the `multishop_lang` setting of your model definition to `true`:

```php
public static $definition = [
    ...
    'multishop_lang' => true,
    ...
```

And then, you must declare which fields are available for translations:

```php
'fields' => array(
    ...
    'additional_description' => [
        ...
        'lang' => true,
        ...
    ],
    ...
)
```

#### Loading or saving a multishop_lang object

While languages are [accessible with accessors]({{< ref "#multiple-language-accessors" >}}), if you need to programmatically retrieve an ObjectModel related to a particular shop (not the selected / current shop from Context), you need to change the method used to load an object:

```php
$targetShopId = 2;
$category = new Category(1, null, $targetShopId); // 1 is the id of the object
```

If you need to update a translatable field on your entity, you need to add a `Shop::setContext()` call before you save your object :

```php
$targetShopId = 2;
Shop::setContext(Shop::CONTEXT_SHOP, $targetShopId);

$category = new Category(1, null, $targetShopId);
$category->additional_description[1] = "Additional description for shop #2"; // language id #1, english
$category->additional_description[2] = "Description additionelle pour le shop #2"; // language id #2, french
$category->save();
```

### Duplicate an object

To duplicate an object, use the following method : `duplicateObject()`

```php
$cms = new Cms(2); 
$duplicatedCms = $cms->duplicateObject();
```

{{% notice info %}}
**duplicateObject will save the object to database.**

Please note that the `duplicateObject()` method will instantly save the duplicated object to the database.
{{% /notice %}}

### Partial update of an object

Since {{< minver v="8.x" >}}, a partial update mechanism is available in ObjectModel. This mechanism allows you to choose which attributes you want to update during the `update()` method call. 

On previous versions ({{< minver v="1.7.x" >}}, {{< minver v="1.6.x" >}}, ...), this method was already available but was not working properly.

Example:

```php
$cms = new Cms(2); 
$cms->position = 4;
$cms->active = 0;
$cms->setFieldsToUpdate(["position" => true]);
$cms->save();
```

In this example, only the `position` is updated, `active` (and all other fields) will not be updated in the database.

#### Partial update of a multi language field

You need to specify the language Ids you want to update, as an array :

```php
$cms = new Cms(2); 
$cms->meta_title[1] = "My awesome title"; // language id #1
$cms->meta_title[2] = "Mon fabuleux titre"; // language id #2
$cms->setFieldsToUpdate(
    [
        "meta_title" => [
            1 => true,
            2 => false
        ]
    ]
);
$cms->save(); // only meta_title for language id #1 will be updated
```

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

{{% notice info %}}
**This method only does Hard deletes**
{{% /notice %}}

## ObjectModel lifecycle and hooks{#lifecycle-hooks}

Thanks to the hooks, you can alter the Object Model or execute functions during the lifecycle of your models. Every hook receive an instance of the manipulated object model:

<div class="mermaid">
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
</div>

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

## Class reference

Here is the reference of the methods described on this page. Many other methods that we don't described here are available.

See complete implementation here : [ObjectModel.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/ObjectModel.php)

```php
/**
 * Builds the object.
 *
 * @param int|null $id if specified, loads and existing object from DB (optional)
 * @param int|null $id_lang required if object is multilingual (optional)
 * @param int|null $id_shop ID shop for objects with multishop tables
 * @param TranslatorComponent|null $translator
 *
 * @throws PrestaShopDatabaseException
 * @throws PrestaShopException
 */
public function __construct($id = null, $id_lang = null, $id_shop = null, $translator = null)

/**
 * Saves current object to database (add or update).
 *
 * @param bool $null_values
 * @param bool $auto_date
 *
 * @return bool Insertion result
 *
 * @throws PrestaShopException
 */
public function save($null_values = false, $auto_date = true)

/**
 * Takes current object ID, gets its values from database,
 * saves them in a new row and loads newly saved values as a new object.
 *
 * @return ObjectModel|false
 *
 * @throws PrestaShopDatabaseException
 */
public function duplicateObject()

/**
 * Deletes current object from database.
 *
 * @return bool True if delete was successful
 *
 * @throws PrestaShopException
 */
public function delete()

/**
 * Deletes multiple objects from the database at once.
 *
 * @param array $ids array of objects IDs
 *
 * @return bool
 */
public function deleteSelection($ids)

/**
 * Does a soft delete on current object, using the "deleted" field in DB
 * If the model object has no "deleted" property or no "deleted" definition field it will throw an exception
 *
 * @return bool
 *
 * @throws PrestaShopDatabaseException
 * @throws PrestaShopException
 */
public function softDelete()

/**
 * Toggles object status in database.
 *
 * @return bool Update result
 *
 * @throws PrestaShopException
 */
public function toggleStatus()

/**
 * This function associate an item to its context.
 *
 * @param int|array $id_shops
 *
 * @return bool|void
 *
 * @throws PrestaShopDatabaseException
 */
public function associateTo($id_shops)

/**
 * Set a list of specific fields to update
 * array(field1 => true, field2 => false,
 * langfield1 => array(1 => true, 2 => false)).
 *
 * @since 1.5.0.1
 *
 * @param array<string, bool|array<int, bool>>|null $fields
 */
public function setFieldsToUpdate(?array $fields)
{
    $this->update_fields = $fields;
}
```