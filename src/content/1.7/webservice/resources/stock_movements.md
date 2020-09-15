---
title: Stock movements
---

# Resources for Stock movements

### Stock_mvt

|           Name           |    Format     | Required |     Description      |
| :----------------------- | :------------ | :------: | :------------------- |
| **id_product**           |               | ❌        | Product ID           |
| **id_product_attribute** |               | ❌        | Product attribute ID |
| **id_warehouse**         |               | ❌        | Warehouse ID         |
| **id_currency**          |               | ❌        | Currency ID          |
| **management_type**      |               | ❌        |                      |
| **id_employee**          | isUnsignedId  | ✔️       | Employee ID          |
| **id_stock**             | isUnsignedId  | ✔️       |                      |
| **id_stock_mvt_reason**  | isUnsignedId  | ✔️       |                      |
| **id_order**             | isUnsignedId  | ❌        | Order ID             |
| **id_supply_order**      | isUnsignedId  | ❌        |                      |
| **product_name**         |               | ❌        |                      |
| **ean13**                |               | ❌        |                      |
| **upc**                  |               | ❌        |                      |
| **reference**            |               | ❌        |                      |
| **mpn**                  |               | ❌        |                      |
| **physical_quantity**    | isUnsignedInt | ✔️       |                      |
| **sign**                 | isInt         | ✔️       |                      |
| **last_wa**              | isPrice       | ❌        |                      |
| **current_wa**           | isPrice       | ❌        |                      |
| **price_te**             | isPrice       | ✔️       |                      |
| **date_add**             | isDate        | ✔️       |                      |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <stock_mvt>
    <id><![CDATA[]]></id>
    <id_product><![CDATA[]]></id_product>
    <id_product_attribute><![CDATA[]]></id_product_attribute>
    <id_warehouse><![CDATA[]]></id_warehouse>
    <id_currency><![CDATA[]]></id_currency>
    <management_type><![CDATA[]]></management_type>
    <id_employee><![CDATA[]]></id_employee>
    <id_stock><![CDATA[]]></id_stock>
    <id_stock_mvt_reason><![CDATA[]]></id_stock_mvt_reason>
    <id_order><![CDATA[]]></id_order>
    <id_supply_order><![CDATA[]]></id_supply_order>
    <product_name>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </product_name>
    <ean13><![CDATA[]]></ean13>
    <upc><![CDATA[]]></upc>
    <reference><![CDATA[]]></reference>
    <mpn><![CDATA[]]></mpn>
    <physical_quantity><![CDATA[]]></physical_quantity>
    <sign><![CDATA[]]></sign>
    <last_wa><![CDATA[]]></last_wa>
    <current_wa><![CDATA[]]></current_wa>
    <price_te><![CDATA[]]></price_te>
    <date_add><![CDATA[]]></date_add>
  </stock_mvt>
</prestashop>
```

