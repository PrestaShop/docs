---
title: Stocks
---

# Resources for Stocks

### Stock

|           Name           |    Format     | Required | Writable | Not filterable |     Description      |
| :----------------------- | :------------ | :------: | :------: | :------------- | :------------------- |
| **id_warehouse**         | isUnsignedId  | ✔️       | ✔️       |                | Warehouse ID         |
| **id_product**           | isUnsignedId  | ✔️       | ✔️       |                | Product ID           |
| **id_product_attribute** | isUnsignedId  | ✔️       | ✔️       |                | Product attribute ID |
| **real_quantity**        |               | ❌        | ❌        | true           |                      |
| **reference**            | isReference   | ❌        | ✔️       |                |                      |
| **ean13**                | isEan13       | ❌        | ✔️       |                |                      |
| **isbn**                 | isIsbn        | ❌        | ✔️       |                |                      |
| **upc**                  | isUpc         | ❌        | ✔️       |                |                      |
| **mpn**                  | isMpn         | ❌        | ✔️       |                |                      |
| **physical_quantity**    | isUnsignedInt | ✔️       | ✔️       |                |                      |
| **usable_quantity**      | isInt         | ✔️       | ✔️       |                |                      |
| **price_te**             | isPrice       | ✔️       | ✔️       |                |                      |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <stock>
    <id><![CDATA[]]></id>
    <id_warehouse><![CDATA[]]></id_warehouse>
    <id_product><![CDATA[]]></id_product>
    <id_product_attribute><![CDATA[]]></id_product_attribute>
    <reference><![CDATA[]]></reference>
    <ean13><![CDATA[]]></ean13>
    <isbn><![CDATA[]]></isbn>
    <upc><![CDATA[]]></upc>
    <mpn><![CDATA[]]></mpn>
    <physical_quantity><![CDATA[]]></physical_quantity>
    <usable_quantity><![CDATA[]]></usable_quantity>
    <price_te><![CDATA[]]></price_te>
  </stock>
</prestashop>
```

