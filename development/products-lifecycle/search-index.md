---
title: Products search index
weight: 42
useMermaid: true
---

# Products search index

In PrestaShop, product search functionality relies on keyword-based indexing. Each search query entered in the search bar undergoes sanitization and is split into individual words. These words are then matched against the `ps_search_word` table. Matching product IDs are retrieved from the `ps_search_index`, followed by the process of weighting and sorting to deliver the most relevant product results.

<div class="mermaid">
flowchart TB
    id1[Search Query] --> id2[Sanitize,\nremove unwanted words,\nsplit by words]
    id2 --> id3[Retrieve `id_word` from `ps_search_word`]
    id3 --> id4[Retrieve `id_product` and `weight` from `ps_search_index`]
    id4 --> id5[Weight results to return most relevant products]
</div>

## Search index structure

<div class="mermaid">
classDiagram
    ps_product <-- ps_search_index
    ps_search_word <-- ps_search_index
    ps_product : int product_id
    ps_product : ...
    class ps_search_index{
        int id_product
        int id_word
        int weight
    }
    class ps_search_word{
        int id_word
        int id_shop
        int id_lang
        varchar word    
    }
</div>

## Search index lifecycle

There are several actions that can trigger a reindex of a product or the complete catalog in the database:

| Location | action | indexation type |
| --- | --- | --- |
| PrestaShop installation | injecting fixtures | product |
| PrestaShop installation | installing a theme | full |
| Back Office | creating a product from Back Office | product |
| Back Office | updating a product from Back Office | product |
| Back Office | duplicating a product from Back Office | product |
| Back Office | deleting a product from Back Office | product |
| Back Office | activating a product from Back Office | product |
| Back Office | creating a new shop | full |
| Back Office | installing a theme | full |
| Back Office | requesting an index rebuild | full or missing product only |
| Webservices | creating a product | product |
| Webservices | updating a product | product |
| Crons | refreshing search index | full |

## Search index fields weights

Almost every field / information in the product is weighted to fine tune result relevance.

The weight of fields is adjustable from the `Back Office > Shop Parameters > Search` with the configuration keys below: 

| Field | Configuration key | Default weight | Description |
| --- | --- | --- | --- |
| pname | `PS_SEARCH_WEIGHT_PNAME` | 6 | Product name |
| reference | `PS_SEARCH_WEIGHT_REF` | 10 | Product reference |
| pa_reference | `PS_SEARCH_WEIGHT_REF` | 10 | Combination reference |
| supplier_reference | `PS_SEARCH_WEIGHT_REF` | 10 | Supplier reference
| pa_supplier_reference | `PS_SEARCH_WEIGHT_REF` | 10 | Combination supplier reference |
| ean13 | `PS_SEARCH_WEIGHT_REF` | 10 | Product EAN13 |
| pa_ean13 | `PS_SEARCH_WEIGHT_REF` | 10 | Combination EAN13 |
| isbn | `PS_SEARCH_WEIGHT_REF` | 10 | Product ISBN |
| pa_isbn | `PS_SEARCH_WEIGHT_REF` | 10 | Combination ISBN |
| upc | `PS_SEARCH_WEIGHT_REF` | 10 | Product UPC |
| pa_upc | `PS_SEARCH_WEIGHT_REF` | 10 | Combination UPC |
| mpn | `PS_SEARCH_WEIGHT_REF` | 10 | Product MPN |
| pa_mpn | `PS_SEARCH_WEIGHT_REF` | 10 | Combination MPN |
| description_short | `PS_SEARCH_WEIGHT_SHORTDESC` | 1 | Product short description |
| description | `PS_SEARCH_WEIGHT_DESC` | 1 | Product description |
| cname | `PS_SEARCH_WEIGHT_CNAME` | 3 | Category name |
| mname | `PS_SEARCH_WEIGHT_MNAME` | 3 | Manufacturer name |
| tags | `PS_SEARCH_WEIGHT_TAG` | 4 | Product tags |
| attributes | `PS_SEARCH_WEIGHT_ATTRIBUTE` | 2 | Combinations |
| features | `PS_SEARCH_WEIGHT_FEATURE` | 2 | Product features |

## Trigger a Search Index refresh by cron

To trigger a search index refresh via cron, create a GET request URL to the Back Office Admin controller, **AdminSearch**.

| Param | Value | Description |
| --- | --- | --- |
| action | searchCron | |
| ajax | 1 | |
| full | 1 | If 1, it will rebuild the full index. If 0 or omitted, it will index only missing products |
| token | **tokenValue** | |


{{% notice note %}}
You can find indexation URL in `Back Office > Shop Parameters > Search > Indexing`
{{% /notice %}}

Instead of manually running the script, you can use an indexation URL with cURL in a crontab.

``` bash
# crontab
# triggers a reindex everyday at 6:00AM
0 6 * * * curl https://domain.tld/admin-xxx/index.php?controller=AdminSearch&action=searchCron&ajax=1&full=1&token=xxxxxxxx
```