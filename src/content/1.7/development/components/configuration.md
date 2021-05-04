---
title: Configuration storage
weight: 80
---

# Configuration storage

The Configuration storage of PrestaShop aims to address two needs.

First, there is multiple situations where a single value has to be stored and be available easily. It can be a boolean to control order mode, it can be a limit for timeout: a simple key => value(s) storage is needed to manage multiple settings in PrestaShop.

Secondly, modules might sometimes need a simple storage system, and they should not have to create a new SQL table for such a simple need.

To address these needs, the Configuration storage of PrestaShop uses a SQL table `ps_configuration` and allows simple fetch, update and deletion of values in it.

{{< figure src="img/configuration_sql_structure.png" title="Configuration SQL structure" >}}

Each value stored in the Configuration component can be controlled through given key, is compatible with Multishop (as it can be overriden for a shop or a group of shop) and has timestamps.


```php
<?php
$a = Configuration::get('MY_MODULE_CONFIGURATION_ITEM');

$b = Configuration::updateValue('MY_MODULE_CONFIGURATION_ITEM', 1778);

Configuration::deleteByName('MY_MODULE_CONFIGURATION_ITEM');
```

{{% notice success %}}
See [Extension concepts > Configuration](/1.7/modules/concepts/configuration/) page for 
detailed usage of the Configuration class
{{% /notice %}}