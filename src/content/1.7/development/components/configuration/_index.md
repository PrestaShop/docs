---
title: "Configuration storage"
weight: 80
aliases:
  - /1.7/modules/concepts/configuration/
---

# Configuration storage service

The Configuration storage of PrestaShop aims to address two needs.

First, there are multiple situations where a single value has to be stored and be available easily. It can be a boolean to control order mode, it can be a limit for timeout: a simple key => value(s) storage is needed to manage multiple settings in PrestaShop.

Secondly, modules might sometimes need a simple storage system, and they should not have to create a new SQL table for such a simple need.

To address these needs, the Configuration storage of PrestaShop uses a SQL table `ps_configuration` and allows simple fetch, update and deletion of values in it.

{{< figure src="../img/configuration_sql_structure.png" title="Configuration SQL structure" >}}

Each value stored in the Configuration component can be controlled through a given key, is compatible with Multishop (as it can be overridden for a shop or a group of shops) and has timestamps.

The storage is managed by the `Configuration` class.

## Usage

### Accessing the component

We recommend using the `prestashop.adapter.legacy.configuration` service to access configuration.

{{% notice note %}}
If you need backward compatibility with versions prior to 1.7 or if you find yourself unable to access the service for any reason, you can use the [legacy Configuration class]({{< ref "backward-compatibility" >}}).
{{% /notice %}}

### Store configuration data

```php
$configuration->set(string $key, mixed $value, ShopConstraint $shopConstraint = null): bool
```

This method returns `true` if the operation is successful, `false` otherwise.

##### Parameters

`$key`
: 
  Identifier to your data to reuse later. You can use any valid string, but by convention, identifiers are usually in `ALL_CAPS_WITH_UNDERSCORES`.
  
`$value`
: 
  Value to store. It can be any scalar type (int, float, string, bool). 

  Note: All values are stored as strings in database, so you might encounter type conversion issues if you save anything other than a string.

  {{% notice note %}}
  **Use of arrays to store multi language values.**
  
  To store a value in multiple languages, You can provide an array indexed by language id:
  ```php
  [
      123 => 'Value in some language',
      456 => 'Value in some other language',
  ]
  ```
  
  Note that this is the **only supported use of arrays**.
  {{% /notice %}}

`$shopConstraint` {{< minver v="1.7.7" >}}
: 
  This optional parameter lets you specify the shop context for the operation (read the "Multistore" section below for more). 
  
  If not provided, the behavior will depend on the global shop context. To avoid unpredictable behavior in Multistore contexts, we recommend setting this parameter.

### Check if a configuration data set exists

```php
$configuration->has(string $key, ShopConstraint $shopConstraint = null): bool
```

This method returns `true` if the data exists, `false` otherwise.

##### Parameters

`$key`
: 
  Identifier to check.

`$shopConstraint` {{< minver v="1.7.7" >}}
: 
  This optional parameter lets you specify the shop context for the operation (read the "Multistore" section below for more). 
  
  If not provided or set to "all shops", this method to checks if the identifier exists for _any_ shop.

### Retrieve configuration data

```php
$configuration->get(string $key, mixed $default = null): mixed
```

This method returns the data for `$key` if it data exists, or `NULL` otherwise.

If the data is stored as multi language, this will return an array of values indexed by language id.

**Parameters:**

`$key`
: 
  Identifier to retrieve.

`$default` {{< minver v="1.7.4" >}}
: 
  This optional parameter lets you define the value to return if the identifier is not found.

### Delete configuration

```php
$configuration->remove(string $key): void
```

This method returns nothing, and throws an Exception on error.

**Parameters:**

`$key`
: 
  Identifier to delete. Note that this method deletes the value for **all shops**.


## Multistore
{{< minver v="1.7.7" title="true" >}}

By default, and unless otherwise specified, the methods described above work within the confines of the current store context, whether PrestaShop is using the multistore feature or not.

However, it is possible to work outside of the current context and impact configurations for all shops, a shop group or a single, specific shop. This is done using the `ShopConstraint` parameter:

- `ShopConstraint::shopId($shopId)` will impact only the specified shop id.
- `ShopConstraint::shopGroup($shopGroupId)` will impact all shops within that shop group id.
- `ShopConstraint::allShops()` will impact all shops.

Example:

```php
// set a value for shop 12 only
$configuration->set(
    'SOME_SETTING',
    'some value',
    ShopConstraint::shopId(12)
);
```
