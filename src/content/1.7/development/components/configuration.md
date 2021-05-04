---
title: Configuration storage
weight: 80
aliases:
  - /1.7/modules/concepts/configuration/
---

# Configuration storage

The Configuration storage of PrestaShop aims to address two needs.

First, there are multiple situations where a single value has to be stored and be available easily. It can be a boolean to control order mode, it can be a limit for timeout: a simple key => value(s) storage is needed to manage multiple settings in PrestaShop.

Secondly, modules might sometimes need a simple storage system, and they should not have to create a new SQL table for such a simple need.

To address these needs, the Configuration storage of PrestaShop uses a SQL table `ps_configuration` and allows simple fetch, update and deletion of values in it.

{{< figure src="../img/configuration_sql_structure.png" title="Configuration SQL structure" >}}

Each value stored in the Configuration component can be controlled through a given key, is compatible with Multishop (as it can be overridden for a shop or a group of shops) and has timestamps.

The storage is performed in `Configuration` class.

We recommend to access it through service `prestashop.adapter.legacy.configuration` (class `PrestaShop\PrestaShop\Adapter`), this is the interface allowing each developer to get or store configuration data.

## Usage

### Store configuration data

```php
Configuration::updateValue(string $key, mixed $value);
```

`$key` will be the reference to your data to reuse later.
`$value` can be any scalar type (int, float, string, bool) or an array.

{{% notice tip %}}

**Multi language**.

By convention, multilanguage values are stored in arrays indexed by language id, like this:
```php
[
    123 => 'Value in some language',
    456 => 'Value in some other language',
]
```
{{% /notice %}}

### Check a configuration data set exists

```php
Configuration::hasKey(string $key);
```

`$key` is the name of the configuration data to check. The method returns `true`
if the data exists, `false` otherwise.

### Retrieve configuration data

#### Single key

```php
Configuration::get(string $key);
```

With `$key` as the data to retrieve.
If the key does not exist, the returned value will be null.

Example:
```php
Configuration::get('PS_VERSION_DB');

// returns '1.7.4.0'
```

#### Multiple keys

```php
Configuration::getMultiple(array $keys);
```

With `$keys` as an array of keys to retrieve.

This returns an array, containing the values stored in the configuration table or null if a key does not exist.

Example:
```php
Configuration::getMultiple(['PS_VERSION_DB', 'UNKNOWN_KEY']);

// returns this array:
[
  'PS_VERSION_DB' => '1.7.4.0',
  'UNKNOWN_KEY' => null,
]
```
#### Delete a key

```php
Configuration::deleteByName(string $key);
```
`$key` is the name of the configuration data to delete. The method returns `true`
if the key is removed, `false` otherwise.
