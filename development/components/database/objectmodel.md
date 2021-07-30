---
title: ObjectModel class
aliases:
 - /1.7/development/database/objectmodel/
---

# The ObjectModel class

When needing to dive deep, you have to use the ObjectModel class. This is the main object of PrestaShop’s object model. It can be overridden… with precaution.

It is an Active Record kind of class (see: [Active record pattern](https://en.wikipedia.org/wiki/Active_record_pattern)). The table attributes or view attributes of PrestaShop’s database are encapsulated in this class. Therefore, the class is tied to a database record. After the object has been instantiated, a new record is added to the database. Each object retrieves its data from the database; when an object is updated, the record to which it is tied is updated as well. The class implements accessors for each attribute.

## Defining the model

You must use the `$definition` static variable in order to define the model.

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

## Multiple stores and/or languages

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

## Main methods


{{% funcdef %}}

__construct($id = NULL, $id_lang = NULL)
: 
    Build object.

add($autodate = true, $nullValues = false)
: 
    Adds current object to the database.

associateTo(integer|array $id_shops)
: 
    Associate an item to its context.

delete()
: 
    Delete current object from database.

deleteImage(mixed $force_delete = false)
: 
    Delete images associated with the object.

deleteSelection($selection)
: 
    Delete several objects from database.

getFields()
: 
    Prepare fields for ObjectModel class (add, update).

getValidationRules($className = \_CLASS\_)
: 
    Return object validation rules (field validity).

save($nullValues = false, $autodate = true)
: 
    Save current object to database (add or update).

toggleStatus()
: 
    Toggle object's status in database.

update($nullValues = false)
: 
    Update current object to database.

validateFields($die = true, $errorReturn = false)
: 
    Check for field validity before database interaction.

{{% /funcdef %}}

## ObjectModel lifecycle

Thanks to the hooks, you can alter the Object Model or execute functions during the lifecycle of your models. Every hook receive an instance of the manipulated object model:

{{< figure src="../../img/object-model-lifecycle.png" title="ObjectModel lifecycle" >}}

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
