---
menuTitle: CsvResponse
title: CsvResponse component
description: Learn how to use the CsvComponent to export data to CSV format

weight: 1
---

# CsvResponse component

Introduced in {{< minver v="1.7.3" >}}, this component allows to export data to CSV Format. 

## Usage of CsvResponse component

To use this component, add a `use` statement in your module: 

```php
use PrestaShopBundle\Component\CsvResponse;
```

Build your data as an `array` of lines, and each line is an `associative array`:

```php
$lines = [
    ["name" => "My product A", "brand" => "Brand 1", "price" => 2204, "ignored_data" => "abcd"],
    ["name" => "My product B", "brand" => "Brand 2", "price" => 1399, "ignored_data" => "efgh"],
    ["name" => "My product C", "brand" => "Brand 3", "price" => 687, "ignored_data" => "ijkl"]
];
```

Create the headers for your columns:

```php
$headersData = [
    "name" => "Product name",
    "brand" => "Product brand",
    "price" => "Product price"
];
```

{{% notice note %}}
You can remove columns from your export by ignoring them in `$headersData`.
{{% /notice %}}

Finally, create and return your `CsvResponse` export: 

```php
return (new CsvResponse())
    ->setHeadersData($headersData)
    ->setData($lines);
```

Since `CsvResponse` extends `Symfony\Component\HttpFoundation\StreamedResponse`, this will create and send to the browser a `Symfony\Component\HttpFoundation\StreamedResponse` (which is extended from `Symfony\Component\HttpFoundation\Response`).

Without any parameter when creating the export, the filename of the export is export_*date*.csv :

```php
'export_' . date('Y-m-d_His') . '.csv'
```

### Set the filename of the export

When creating / returning the `CsvResponse`, use `setFilename()` method to set a specific filename for the export:

```php
return (new CsvResponse())
    ->setHeadersData($headersData)
    ->setData($lines)
    ->setFilename("my_awesome_export.csv");
```

### Advanced usage with a callback function to export large amounts of data (chunking)

Sometimes you will need to export large parts of data with a large memory usage, that can cause performance issues. 
To achieve this, you can't just query your database and retrieve your large amount of data. 
You need to chunk your data, and build your csv export chunk by chunk. 

Let's understand how to do this: 

1) Create a `callback function`, with two parameters: `$offset` and `$limit`. 

```php
$dataCallback = function ($offset, $limit){
    $data = $myRepository->getData($offset, $limit);
    return $data;
}
```

This `callback function` returns a set of data from a repository (eg. a database), with `$offset` and `$limit` parameters (eg. a `LIMIT 0,5000` SQL query).

2) Create your CsvResponse with your `callback function` as data: 

```php
return (new CsvResponse())
    ->setHeadersData($headersData)
    ->setData($dataCallback);
```

The default `$limit` is set to `5000`.
You can modify this limit by calling `setLimit(int $limit)`:

```php
return (new CsvResponse())
    ->setHeadersData($headersData)
    ->setData($dataCallback)
    ->setLimit(1000);
```

Since `$dataCallback` is a `callable`, `CsvResponse` will loop over your `callback function` when creating the Csv.

There are two modes when retrieving data with a `callback function`:

- `CsvResponse::MODE_OFFSET`: Your callback function is receiving `$offset` (index to start retrieving items at) and `$limit` (count of items to retrieve). This is the equivalent of MySql `LIMIT 0,100`, `LIMIT 100,100`, `LIMIT 200,100`.
- `CsvResponse::MODE_PAGINATION`: Your callback function is receiving `$offset` (page number) and `$limit` (count of items to retrieve), and will handle its pagination itself. 

The default mode is `MODE_PAGINATION`.

When looping over your `callback function`, the `CsvResponse` is retrieving `$limit` items, while there are results. 

#### Mode pagination

`$offset` is starting at `1`, and is increased by `1` at each loop. To use this mode, add:

```php
->setModeType(CsvResponse::MODE_PAGINATION)
```

#### Mode offset

`$offset` is starting at `0`, and is increased by `$limit` at each loop. To use this mode, add:

```php
->setModeType(CsvResponse::MODE_OFFSET)
```

{{% notice note %}}
A good example implementation of `CsvResponse::MODE_OFFSET` can be seen in [ProductCsvExporter.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Product/ProductCsvExporter.php#L56-L97)
{{% /notice %}}

#### Manually setting $start parameter

`$start` parameter can be set manually by adding a `setStart(int $start)` call to your `CsvResponse`:

```php
return (new CsvResponse())
    ->setHeadersData($headersData)
    ->setData($dataCallback)
    ->setStart($start)
    ->setLimit($limit)
```

### Hide header line from export

From {{< minver v="8.0" >}}, to disable header line from export, use the `setIncludeHeaderRow()` method. This method expects a boolean parameter indicating if the header line should be displayed or not. 

```php
return (new CsvResponse())
    ->setHeadersData($headersData)
    ->setData($lines)
    ->setIncludedHeaderRow(false);
```