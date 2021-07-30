---
title: Specific prices
weight: 3
aliases:
  - /1.7/development/webservice/tutorials/advanced-use/specific-price/
---

# Specific prices

PrestaShop offers a feature that allows to set specific prices depending on various parameters (country, currency, customer group, ...). The regular API only return the generic prices so if you need some specific prices you can use the `price` parameter. It is available on:

- products
- combinations

Custom prices will be added in an alias field that you need to indicate in your parameters.

## Example

Let's say you want to retrieve the price for combination `25` of the product `2`, with tax, in a webservice field name `my_price`, then you'll need to query:

`/api/products/2?price[my_price][use_tax]=1&price[my_price][product_attribute]=25`

This will add an XML node into the product response:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <product>
        <id><![CDATA[2]]></id>
        ...
        <my_price><![CDATA[34.460000]]></my_price>
        ...
    </product>
</prestashop>
```

## Specific price parameters

| Name | Type | Description |
|------|------|-------------|
| **country** | int | Customer's country (use the resource ID) |
| **state** | int | Customer's state (use the resource ID) |
| **postcode** | int | Customer's zip/postal code |
| **currency** | int | Currency used for the price (use the resource ID) |
| **group** | int | Customer's user group (use the resource ID) |
| **quantity** | int | Quantity of products |
| **product_attribute** | int | Product attribute (combination) ID |
| **decimals** | int | Number of decimals used for rounding (displayed result may still have more with pending zeros) |
| **use_tax** | bool | Include taxes in the price (allowed values: {{< code >}}0|1{{< /code >}}) |
| **use_reduction** | bool | Include reduction associated to the specific price (allowed values: {{< code >}}0|1{{< /code >}}) |
| **only_reduction** | bool | Only display the reduction associated to the specific price (allowed values: {{< code >}}0|1{{< /code >}}) |
| **use_ecotax** | bool | Include eco tax in the price (allowed values: {{< code >}}0|1{{< /code >}}) |

{{% notice note %}}
You can define multiple specific prices in the same request, which is useful if you need prices with and without taxes: `/api/products/2?price[my_price_tax_incl][use_tax]=1&price[my_price_tax_excl][use_tax]=0`

Or if you want the product price along with its reduction detail: `/api/products/2?price[my_price][use_reduction]=1&price[my_reduction][only_reduction]=1`
{{% /notice %}}
