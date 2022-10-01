---
title: Backward compatible configuration storage
menuTitle: Backward compatibility
---

# Backward compatible configuration storage

PrestaShop 8 maintains the 1.6 configuration class for backward compatibility. 

If you don't need compatibility with 1.6 shops, we suggest using the [Configuration service]({{< ref "../configuration/" >}}) instead.

## Usage

### Store configuration data

```php
Configuration::updateValue(string $key, mixed $value): bool
```

This method returns `true` if the operation is successful, `false` otherwise.

**Parameters:**

`$key`
: Identifier to your data to reuse later. You can use any valid string, but by convention, identifiers are usually in `ALL_CAPS_WITH_UNDERSCORES`.

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

### Check if a configuration data set exists

```php
Configuration::hasKey(string $key): bool
```

This method returns `true` if the data exists, `false` otherwise.

**Parameters:**

`$key`
: Identifier to check.

### Retrieve configuration data

```php
// static call
Configuration::get(string $key): mixed
```

This method returns the data for `$key` if it data exists, or `NULL` otherwise.

**Parameters:**

`$key`
: Identifier to retrieve.

### Delete configuration

```php
Configuration::deleteByName(string $key)
```

This method returns `true` if the key is removed, `false` otherwise.

**Parameters:**

`$key`
: Identifier to delete. Note that this method deletes the value for **all shops**.


## Multistore

By default, all these methods work within the confines of the current store context, whether PrestaShop is using the multistore feature or not.

However, it is possible to work outside of the current context and impact configurations for all shops, a shop group or a single, specific shop. This is done using three optional parameters, which are not presented in the list above:

- `id_lang`: enables you to force the language with which you want to work.
- `id_shop_group`: enables you to indicate the shop group of the target store.
- `id_shop`: enables you to indicate the id of the target store.

