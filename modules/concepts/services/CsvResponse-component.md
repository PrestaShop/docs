---
menuTitle: CsvResponse component
title: CsvResponse component
description: Learn how to use the CsvComponent to export data to CSV format

weight: 1
---

# CsvResponse component

Introduced in {{< minver v="1.7.3" >}}, this component allows to export data to CSV Format. 

## Basic usage of CsvResponse component

To use this component, add a `use` statement in your module: 

```php
use PrestaShopBundle\Component\CsvResponse;
```

Then, build your data as an `array` of lines, and each line is an `associative array`:

```php
$lines = [
    ["name" => "My product A", "brand" => "Brand 1", "price" => 2204],
    ["name" => "My product B", "brand" => "Brand 2", "price" => 1399],
    ["name" => "My product C", "brand" => "Brand 3", "price" => 687]
];
```

Finally, create and return your CsvResponse export: 

```php
return (new CsvResponse())
    ->setData($lines);
```

Since `CsvResponse` extends `Symfony\Component\HttpFoundation\StreamedResponse`, this will create and send to the browser a `Symfony\Component\HttpFoundation\StreamedResponse` (which is extended from `Symfony\Component\HttpFoundation\Response`).

Without any parameter when creating the export, the filename of the export is export_*date*.csv :

```php
'export_' . date('Y-m-d_His') . '.csv'
```

### Set the filename of the export

When creating / returning the CsvResponse, use `setFilename()` method to set a specific filename for the export:

```php
return (new CsvResponse())
    ->setData($lines)
    ->setFilename("my_awesome_export.csv");
```

## Class reference

