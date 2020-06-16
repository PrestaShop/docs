---
title: Configuration
weight: 1
---

# Configuration

Data can be saved in the shop database without requiring a module
specific table to be created.

The table configuration contains a list of key => value(s) properties which can
be accessed from anywhere, including in a module.
The `Configuration` class is the interface allowing each module developer to
get or store data in this table.

### Store configuration data

```php
<?php
Configuration::updateValue(string $key, mixed $value);
```

`$key` will be the reference to your data to reuse later.
`$value` can be any scalar type (int, string, bool, array...).

### Check a configuration data exists

```php
<?php
Configuration::hasKey(string $key);
```

`$key` is the name of the configuration data to check. The method returns `true`
if the data exists, `false` otherwise.

### Retrieve configuration data

#### Single key

```php
<?php
Configuration::get(string $key);
```

With `$key` as the data to retrieve.
If the key does not exist, the returned value will be null.

Example:
```php
<?php
Configuration::get('PS_VERSION_DB');

// returns '1.7.4.0'
```

#### Multiple keys

```php
<?php
Configuration::getMultiple(array $keys);
```

With `$keys` as an array of keys to retrieve.

This returns an array, containing the values stored in the configuration table or null if a key does not exist.

Example:
```php
<?php
Configuration::getMultiple(array('PS_VERSION_DB', 'UNKNOWN_KEY'));

// returns this array:
array(
  'PS_VERSION_DB' => '1.7.4.0',
  'UNKNOWN_KEY' => null,
)
```

### Use widgets
