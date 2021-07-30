---
title: Enabling the Auto-Update
weight: 6
aliases:
  - /1.7/modules/creation/enabling_auto_update
  - /module/05-CreatingAPrestaShop17Module/07-EnablingTheAutoUpdate.html
---

Enabling the Auto-Update
========================

Since PrestaShop 1.5, it is possible to have your module auto-update: once a new version is available, PrestaShop suggests an "Update" button to the user. Clicking this button will trigger a series of methods, each leading closer to the latest version of your module.

In order to bring auto-update support to your module, you need three main things:

1. Clearly indicate the module's version number in its constructor method: `$this->version = '1.1'`;
2. Create an `/upgrade` sub-folder in the module's folder.
3. Add an auto-update PHP script for each new version.  

Each script should contain a main method named `upgrade_module_x_y_z`, where `x_y_z` corresponds to the version the module is being upgraded to. It receives a single parameter, an instance of your Module.

{{% callout %}}
##### Script name

Your script must be named `upgrade`, followed by a dash (`-`) and the version number, like `upgrade-x.y.z.php`.

For example:
- `upgrade-1.2.3.php`

{{% /callout %}}

For example:

```php
<?php
/**
 * File: /upgrade/upgrade-1.1.php
 */
function upgrade_module_1_1($module) {
    // Process Module upgrade to 1.1
    // ....
    return true; // Return true if success.
}
```

...and then:

```php
<?php
/**
 * File: /upgrade/upgrade-1.2.php
 */
function upgrade_module_1_2($module) {
    // Process Module upgrade to 1.2
    // ....
    return true; // Return true if succes.
 }
 ```

Each method should bring the necessary changes to the module's files and database data in order to reach the latest version.

When upgrading a module, PrestaShop will crawl the module's `upgrade` folder, and execute each upgrade script sequentially, starting from the first one whose version number is greater than the currently installed one. It is therefore highly advised to number your module's
versions sequentially, following the [Semantic Versioning Specification](https://semver.org/#semantic-versioning-specification-semver).

Example using the scripts above:

When upgrading from... | Target version | Executed scripts
--- | --- | ---
1.0.0 | 1.1.0 | - `upgrade-1.1.php`
1.0.0 | 1.2.0 | - `upgrade-1.1.php`<br>- `upgrade-1.2.php`
1.1.0 | 1.2.0 | - `upgrade-1.2.php`

## Script examples

Here is the `/upgrade/upgrade-1.4.9.php` file from the `gamification` module:

```php
<?php
if (!defined('_PS_VERSION_')) {
    exit;
}
    
function upgrade_module_1_4_9($object)
{
    return Db::getInstance()->execute(
        'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tab_advice` (
        `id_tab` int(11) NOT NULL,
        `id_advice` int(11) NOT NULL,
        PRIMARY KEY (`id_tab`, `id_advice`)
        ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;'
    );
}
```

The homeslider module's `install-1.2.1.php` file does even more:

```php
<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_1_2_1($object)
{
    return Db::getInstance()->execute(
        'UPDATE '._DB_PREFIX_.'homeslider_slides_lang SET
            '.homeslider_stripslashes_field('title').',
            '.homeslider_stripslashes_field('description').',
            '.homeslider_stripslashes_field('legend').',
            '.homeslider_stripslashes_field('url')
    );
}

function homeslider_stripslashes_field($field)
{
    $quotes = array('"\\\'"', '"\'"');
    $dquotes = array('\'\\\\"\'', '\'"\'');
    $backslashes = array('"\\\\\\\\"', '"\\\\"');
    return '`'.bqSQL($field).'` = replace(replace(replace(`'.bqSQL($field).'`, '.$quotes[0].', '.$quotes[1].'), '.$dquotes[0].', '.$dquotes[1].'), '.$backslashes[0].', '.$backslashes[1].')';
}
```

## Adding/updating modules or hooks between versions

If the new version of your module adds or update its hooks, you should
make sure to update them too.

Indeed, since the hooks are (usually) defined when the module is
installed, PrestaShop will not install the module again in order to
include the new hooks' code, so you have to use the upgrade methods:

For instance, here's the `install-1.2.php` file from the blockbestseller
module:

```php
<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_1_2($object)
{
    return ($object->registerHook('addproduct') &&
        $object->registerHook('updateproduct') &&
        $object->registerHook('deleteproduct') &&
        $object->registerHook('actionOrderStatusPostUpdate'));
}
```

## How to test-run an upgrade

Here's how to test that your upgrade scripts work correctly.

Let's assume that you are working on a module that you already have it installed in your development shop, and you're on version 1.0.0. On the upcoming version 1.1.0 that you are currently developing, you need to update your database schema.

Since the version that you are planning to update to is 1.1.0, the first thing would be to create an upgrade script for that version:

```php
<?php
// File: /upgrade/upgrade-1.1.0.php

if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_1_1_0($module)
{
    // do your thing here
    return true;
}
```

Now, update your module version to 1.1.0:

```php
<?php
class my_module extends Module
{
    public function __construct()
    {
        $this->name = 'my_module';
        $this->version = '1.1.0';   // <--- previously 1.0.0
    }
}
```

Then, in your PrestaShop backoffice, go to _Modules > Module Manager_ and find your module. Since you have updated its version, PrestaShop will notice that there's an update available for it and prompt you to upgrade it. Press the "Upgrade" button, and PrestaShop will invoke your upgrade script.
