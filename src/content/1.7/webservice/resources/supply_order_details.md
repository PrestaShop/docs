---
title: Supply order details
---

# Resources for Supply order details

### Supply_order_detail

|               Name                |    Format     | Required |     Description      |
| :-------------------------------- | :------------ | :------: | :------------------- |
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
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <supply_order_detail>
    <id><![CDATA[]]></id>
    <id_supply_order><![CDATA[]]></id_supply_order>
    <id_product><![CDATA[]]></id_product>
    <id_product_attribute><![CDATA[]]></id_product_attribute>
    <reference><![CDATA[]]></reference>
    <supplier_reference><![CDATA[]]></supplier_reference>
    <name><![CDATA[]]></name>
    <ean13><![CDATA[]]></ean13>
    <isbn><![CDATA[]]></isbn>
    <upc><![CDATA[]]></upc>
    <mpn><![CDATA[]]></mpn>
    <exchange_rate><![CDATA[]]></exchange_rate>
    <unit_price_te><![CDATA[]]></unit_price_te>
    <quantity_expected><![CDATA[]]></quantity_expected>
    <quantity_received><![CDATA[]]></quantity_received>
    <price_te><![CDATA[]]></price_te>
    <discount_rate><![CDATA[]]></discount_rate>
    <discount_value_te><![CDATA[]]></discount_value_te>
    <price_with_discount_te><![CDATA[]]></price_with_discount_te>
    <tax_rate><![CDATA[]]></tax_rate>
    <tax_value><![CDATA[]]></tax_value>
    <price_ti><![CDATA[]]></price_ti>
    <tax_value_with_order_discount><![CDATA[]]></tax_value_with_order_discount>
    <price_with_order_discount_te><![CDATA[]]></price_with_order_discount_te>
  </supply_order_detail>
</prestashop>
```

