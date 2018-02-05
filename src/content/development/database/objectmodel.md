---
title: ObjectModel
weight: 15
---

## The ObjectModel class

When needing to dive deep, you have to use the ObjectModel class. This is the main object of PrestaShop’s object model. It can be overridden… with precaution.

It is an Active Record kind of class (see: http://en.wikipedia.org/wiki/Active_record_pattern). The table attributes or view attributes of PrestaShop’s database are encapsulated in this class. Therefore, the class is tied to a database record. After the object has been instantiated, a new record is added to the database. Each object retrieves its data from the database; when an object is updated, the record to which it is tied is updated as well. The class implements accessors for each attribute.

### Defining the model

You must use the `$definition` static variable in order to define the model.

For instance:

```php
/**
 * Example from the CMS model (CMSCore)
 */
 public static $definition = array(
   'table' => 'cms',
   'primary' => 'id_cms',
   'multilang' => true,
   'fields' => array(
     'id_cms_category'  => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
     'position'         => array('type' => self::TYPE_INT),
     'active'           => array('type' => self::TYPE_BOOL),
 
     // Language fields
     'meta_description' =>
         array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
     'meta_keywords'    =>
         array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
     'meta_title'       =>
         array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'required' => true, 'size' => 128),
     'link_rewrite'     =>
         array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isLinkRewrite', 'required' => true, 'size' => 128),
     'content'          =>
         array('type' => self::TYPE_HTML,   'lang' => true, 'validate' => 'isString', 'size' => 3999999999999),
   ),
 );
```
