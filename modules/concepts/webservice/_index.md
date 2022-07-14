---
title: Webservice
---

# Webservice
{{< minver v="1.7" title="true" >}}

## PrestaShop Webservice
PrestaShop enables merchants to give third-party tools access to their shop's database through a CRUD API, otherwise called a web service.

Since 1.7 version, developers can extend the resources available through the PrestaShop Webservice with a module.

### Create and declare your new entity

The following example is about an entity that can manage blog articles, the folder where you create your Entity is not relevant.

PS: Remember to create the respective table(s) in the database, usually created during the module installation. Don't forget to set your [composer.json](#composer-configuration-to-use-namespaces-in-your-objectmodel-entity) correctly to use namespaces and autoload of your classes in the PrestaShop environment.
```php
<?php
// modules/yourmodule/src/Models/Article.php
namespace Acme\MyModule\Models;

Use PrestaShop\PrestaShop\Adapter\Entity\ObjectModel;

class Article extends ObjectModel
{
    public $title;
    public $type;
    public $content;
    public $meta_title;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'article',
        'primary' => 'id_article',
        'multilang' => true,
        'fields' => array(
            'title' => array('type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'required' => true, 'size' => 255),
            'type' => array('type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'required' => true, 'size' => 255),

            // Lang fields
            'content' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml', 'size' => 4000),
            'meta_title' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml', 'size' => 255)
        )
    );

  protected $webserviceParameters = array(
    'objectNodeName' => 'article',
    'objectsNodeName' => 'articles',
    'fields' => array(
      'title' => array('required' => true),
      'type' => array('required' => true),
      'content' => array(),
      'meta_title' => array(),
    )
  );
}
```

The `$webserviceParameters` array is mandatory to define how and which fields to expose.

The key to access all the elements:
```php
'objectsNodeName' => 'articles'
```

The key to access a single element:
```php
'objectNodeName' => 'articles'
```

The parameter to set which fields to expose through the webservice and settings for each of them:
```php
'fields' => array()
```

### Register it through the addWebserviceResources hook
The hook `addWebserviceResources` must be registered by your module, usually done during the module installation.
```php
public function hookAddWebserviceResources($params)
{
  return [
    'articles' => array(
        'description' => 'Blog articles', 
        'class' => 'Acme\MyModule\Models\Article',
        'forbidden_method' => array('DELETE') // optional
    )
  ];
}
```

### Composer configuration to use namespaces in your ObjectModel entity

To correctly load your class (Entity) you need to configure correctly your composer.json
The following is an example of a correct configuration to load your entities in whatever folder you want.

```php
// modules/yourmodule/composer.json
```
```json
{
    "name": "yourname/yourmodule",
    "autoload" : {
        "psr-4" : {
            "Acme\\MyModule\\" : "src/"
        }
    },
    "type" : "prestashop-module"
}
```

Don't forget to load the `autoload.php` in your module
```php
// modules/yourmodule/mymodule.php
<?php
// ...

require_once __DIR__.'/vendor/autoload.php';

// ...
```
