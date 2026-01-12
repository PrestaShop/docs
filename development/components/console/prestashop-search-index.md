---
title: prestashop:search:index
category: Search & Indexing
description: Rebuild search index for products
weight: 10
---

# prestashop:search:index

{{< minver v="9.1" title="true" >}}

## Description

This command indexes products for the PrestaShop search functionality. It can rebuild the entire search index or index specific products, shops, or shop groups.

## Usage

```bash
php bin/console prestashop:search:index [options]
```

### Options

- **--full, -f**: Rebuild the whole search index (removes all existing indexed data and reindexes everything)
- **--shop-id, -s**: Shop ID to index (only index products for a specific shop)
- **--shop-group-id, -g**: Shop group ID to index (only index products for a specific shop group)
- **--product-id, -p**: Product ID to index (only index a specific product)

## Examples

### Rebuild entire search index

Completely rebuild the search index for all products across all shops:

```bash
php bin/console prestashop:search:index --full
```

### Index a specific shop

Index products only for shop with ID 2:

```bash
php bin/console prestashop:search:index --shop-id=2
```

### Index a specific shop group

Index products for all shops in shop group 1:

```bash
php bin/console prestashop:search:index --shop-group-id=1
```

### Index a specific product

Reindex only product with ID 42:

```bash
php bin/console prestashop:search:index --product-id=42
```

### Combine options

Rebuild index for a specific shop:

```bash
php bin/console prestashop:search:index --full --shop-id=2
```

## Scope behavior

If no shop-specific option is provided, the command will index products for **all shops**.

## Error Handling

The command will display an error if:
- The specified shop ID does not exist
- The specified shop group ID does not exist
- The specified product ID does not exist or is invalid
- There are constraint violations or indexation issues

## Use cases

- After bulk product imports or updates
- When search results are outdated or incorrect
- After making changes to product attributes used in search
- Troubleshooting search functionality issues
- Initial setup of a new shop or shop group
- Scheduled maintenance tasks (via cron)

## Performance considerations

- Using `--full` will remove and rebuild the entire index, which can be time-consuming for large catalogs
- For large shops, consider running this command during off-peak hours
- Indexing specific products or shops is much faster than full reindexing
