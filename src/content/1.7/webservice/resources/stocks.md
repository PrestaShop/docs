---
title: Stocks
---

# Resources for Stocks

### Stock

|           Name           |    Format     | Required | Writable | Not filterable |     Description      |
| :----------------------- | :------------ | :------- | :------- | :------------- | :------------------- |
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
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <stock>
    <id>
    </id>
    <id_warehouse>
    </id_warehouse>
    <id_product>
    </id_product>
    <id_product_attribute>
    </id_product_attribute>
    <reference>
    </reference>
    <ean13>
    </ean13>
    <isbn>
    </isbn>
    <upc>
    </upc>
    <mpn>
    </mpn>
    <physical_quantity>
    </physical_quantity>
    <usable_quantity>
    </usable_quantity>
    <price_te>
    </price_te>
  </stock>
</prestashop>
```

