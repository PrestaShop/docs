---
title: Supply order details
---

# Resources for Supply order details

### Supply_order_detail

|               Name                |    Format     | Required |     Description      |
| :-------------------------------- | :------------ | :------- | :------------------- |
| **id_supply_order**               | isUnsignedId  | ✔️       |                      |
| **id_product**                    | isUnsignedId  | ✔️       | Product ID           |
| **id_product_attribute**          | isUnsignedId  | ✔️       | Product attribute ID |
| **reference**                     | isReference   | ❌        |                      |
| **supplier_reference**            | isReference   | ❌        |                      |
| **name**                          | isGenericName | ✔️       |                      |
| **ean13**                         | isEan13       | ❌        |                      |
| **isbn**                          | isIsbn        | ❌        |                      |
| **upc**                           | isUpc         | ❌        |                      |
| **mpn**                           | isMpn         | ❌        |                      |
| **exchange_rate**                 | isFloat       | ✔️       |                      |
| **unit_price_te**                 | isPrice       | ✔️       |                      |
| **quantity_expected**             | isUnsignedInt | ✔️       |                      |
| **quantity_received**             | isUnsignedInt | ❌        |                      |
| **price_te**                      | isPrice       | ✔️       |                      |
| **discount_rate**                 | isFloat       | ✔️       |                      |
| **discount_value_te**             | isPrice       | ✔️       |                      |
| **price_with_discount_te**        | isPrice       | ✔️       |                      |
| **tax_rate**                      | isFloat       | ✔️       |                      |
| **tax_value**                     | isPrice       | ✔️       |                      |
| **price_ti**                      | isPrice       | ✔️       |                      |
| **tax_value_with_order_discount** | isFloat       | ✔️       |                      |
| **price_with_order_discount_te**  | isPrice       | ✔️       |                      |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <supply_order_detail>
    <id>
    </id>
    <id_supply_order>
    </id_supply_order>
    <id_product>
    </id_product>
    <id_product_attribute>
    </id_product_attribute>
    <reference>
    </reference>
    <supplier_reference>
    </supplier_reference>
    <name>
    </name>
    <ean13>
    </ean13>
    <isbn>
    </isbn>
    <upc>
    </upc>
    <mpn>
    </mpn>
    <exchange_rate>
    </exchange_rate>
    <unit_price_te>
    </unit_price_te>
    <quantity_expected>
    </quantity_expected>
    <quantity_received>
    </quantity_received>
    <price_te>
    </price_te>
    <discount_rate>
    </discount_rate>
    <discount_value_te>
    </discount_value_te>
    <price_with_discount_te>
    </price_with_discount_te>
    <tax_rate>
    </tax_rate>
    <tax_value>
    </tax_value>
    <price_ti>
    </price_ti>
    <tax_value_with_order_discount>
    </tax_value_with_order_discount>
    <price_with_order_discount_te>
    </price_with_order_discount_te>
  </supply_order_detail>
</prestashop>
```

