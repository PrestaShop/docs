---
title: Specific prices
---

# Resources for Specific prices

### Specific_price

|            Name            |     Format      | Required |     Description      |
| :------------------------- | :-------------- | :------: | :------------------- |
| **id_shop_group**          | isUnsignedId    | ❌        | Shop group ID        |
| **id_shop**                | isUnsignedId    | ✔️       | Shop ID              |
| **id_cart**                | isUnsignedId    | ✔️       | Cart ID              |
| **id_product**             | isUnsignedId    | ✔️       | Product ID           |
| **id_product_attribute**   | isUnsignedId    | ❌        | Product attribute ID |
| **id_currency**            | isUnsignedId    | ✔️       | Currency ID          |
| **id_country**             | isUnsignedId    | ✔️       | Country ID           |
| **id_group**               | isUnsignedId    | ✔️       |                      |
| **id_customer**            | isUnsignedId    | ✔️       | Customer ID          |
| **id_specific_price_rule** | isUnsignedId    | ❌        |                      |
| **price**                  | isNegativePrice | ✔️       |                      |
| **from_quantity**          | isUnsignedInt   | ✔️       |                      |
| **reduction**              | isPrice         | ✔️       |                      |
| **reduction_tax**          | isBool          | ✔️       |                      |
| **reduction_type**         | isReductionType | ✔️       |                      |
| **from**                   | isDateFormat    | ✔️       |                      |
| **to**                     | isDateFormat    | ✔️       |                      |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <specific_price>
    <id><![CDATA[]]></id>
    <id_shop_group><![CDATA[]]></id_shop_group>
    <id_shop><![CDATA[]]></id_shop>
    <id_cart><![CDATA[]]></id_cart>
    <id_product><![CDATA[]]></id_product>
    <id_product_attribute><![CDATA[]]></id_product_attribute>
    <id_currency><![CDATA[]]></id_currency>
    <id_country><![CDATA[]]></id_country>
    <id_group><![CDATA[]]></id_group>
    <id_customer><![CDATA[]]></id_customer>
    <id_specific_price_rule><![CDATA[]]></id_specific_price_rule>
    <price><![CDATA[]]></price>
    <from_quantity><![CDATA[]]></from_quantity>
    <reduction><![CDATA[]]></reduction>
    <reduction_tax><![CDATA[]]></reduction_tax>
    <reduction_type><![CDATA[]]></reduction_type>
    <from><![CDATA[]]></from>
    <to><![CDATA[]]></to>
  </specific_price>
</prestashop>
```

