---
title: Stock movements
---

# Resources for Stock movements

### Stock_mvt

|           Name           |    Format     | Required |     Description      |
| :----------------------- | :------------ | :------- | :------------------- |
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
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <stock_mvt>
    <id>
    </id>
    <id_product>
    </id_product>
    <id_product_attribute>
    </id_product_attribute>
    <id_warehouse>
    </id_warehouse>
    <id_currency>
    </id_currency>
    <management_type>
    </management_type>
    <id_employee>
    </id_employee>
    <id_stock>
    </id_stock>
    <id_stock_mvt_reason>
    </id_stock_mvt_reason>
    <id_order>
    </id_order>
    <id_supply_order>
    </id_supply_order>
    <product_name>
      <language id="1"/>
      <language id="2"/>
    </product_name>
    <ean13>
    </ean13>
    <upc>
    </upc>
    <reference>
    </reference>
    <mpn>
    </mpn>
    <physical_quantity>
    </physical_quantity>
    <sign>
    </sign>
    <last_wa>
    </last_wa>
    <current_wa>
    </current_wa>
    <price_te>
    </price_te>
    <date_add>
    </date_add>
  </stock_mvt>
</prestashop>
```

