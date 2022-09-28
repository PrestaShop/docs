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

PS: Remember to create the respective table(s) in the database, usually created during the module installation.
```php
<?php
// modules/yourmodule/src/Entity/Article.php

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
            'type' => array('type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'required' => true, 'size' => 255),
            'date_add' => ['type' => self::TYPE_DATE, 'validate' => 'isDate'],
            'date_upd' => ['type' => self::TYPE_DATE, 'validate' => 'isDate'],

            // Lang fields
            'title' => array('type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'required' => true, 'size' => 255),
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

### Registration with a hook
The hook `addWebserviceResources` must be registered and implemented by your module.
```php
public function hookAddWebserviceResources($params)
{
    return [
      'articles' => [
          'description' => 'Blog articles', // The description for those who access to this resource through WS
          'class' => 'Article', // The classname of your Entity
          'forbidden_method' => array('DELETE') // Optional, if you want to forbid some methods
      ]
    ];
}
```

### Load your entity
Don't forget to include the class file of your entity (i.e. Article.php) at the top of your main module file.
The following is an example of a correct configuration to load your example entity to your module.

```php
include_once _PS_MODULE_DIR_ . 'wsarticle/src/Entity/Article.php';
```

### Complete example of a main module file

```php
<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

include_once _PS_MODULE_DIR_ . 'wsarticle/src/Entity/Article.php';

class WsArticle extends Module
{
    public function __construct()
    {
        $this->name = 'wsarticle';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'PrestaShop';
        $this->need_instance = 0;
        $this->secure_key = Tools::encrypt($this->name);
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->getTranslator()->trans('Extend WS demo module', array(), 'Modules.Wsarticle.Admin');
    }

    public function install()
    {
        return parent::install() &&
            $this->installDB() && // Create tables in the DB
            $this->registerHook('addWebserviceResources'); // Register the module to the hook
    }

    public function installDB()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.Article::$definition['table'].'` (
            `id_article` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `type` varchar(255),
            `date_add` datetime NOT NULL,
            `date_upd` datetime NOT NULL,
            PRIMARY KEY  (`id_article`)
        ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci';

        $sql_lang = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.Article::$definition['table'].'_lang` (
            `id_article` int(10) unsigned NOT NULL,
            `id_lang` int(10) unsigned NOT NULL,
            `title` varchar(255),
            `content` text NOT NULL,
            `meta_title` varchar(255) NOT NULL,
            PRIMARY KEY  (`id_article`, `id_lang`)
        ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci';

        if (Db::getInstance()->execute($sql) && Db::getInstance()->execute($sql_lang)) {
            return true;
        }
        
        return false;
    }

    public function hookAddWebserviceResources($params)
    {
        return [
            'articles' => array(
                'description' => 'Blog articles', // The description for those who access to this resource through WS
                'class' => 'Article', // The classname of your Entity
                'forbidden_method' => array('DELETE') // Optional, if you want to forbid some methods
            )
        ];
    }
}
```

### Final notes

Following the example above, the new resource will be available in the webservice resources list:

{{< figure src="../img/new-ws-resource.png" title="New Webservice resource" >}}

This new resource will be accessible through your API endpoint behind the name that you set in `objectsNodeName`, for instance:

`https://mywebsite.shop/api/articles`

will return something similar to what you can see on the screenshot below (it is the XML response previewed in the browser):

{{< figure src="../img/empty-articles.png" title="Webservice articles list (empty)" >}}

And something like on the next screenshot, if you have articles in the database:

{{< figure src="../img/articles-list.png" title="Webservice articles list (one article)" >}}
