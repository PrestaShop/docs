---
title: Specific prices
---

# Resources for Specific prices

### Specific_price

|            Name            |     Format      | Required |     Description      |
| :------------------------- | :-------------- | :------- | :------------------- |
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
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <specific_price>
    <id>
    </id>
    <id_shop_group>
    </id_shop_group>
    <id_shop>
    </id_shop>
    <id_cart>
    </id_cart>
    <id_product>
    </id_product>
    <id_product_attribute>
    </id_product_attribute>
    <id_currency>
    </id_currency>
    <id_country>
    </id_country>
    <id_group>
    </id_group>
    <id_customer>
    </id_customer>
    <id_specific_price_rule>
    </id_specific_price_rule>
    <price>
    </price>
    <from_quantity>
    </from_quantity>
    <reduction>
    </reduction>
    <reduction_tax>
    </reduction_tax>
    <reduction_type>
    </reduction_type>
    <from>
    </from>
    <to>
    </to>
  </specific_price>
</prestashop>
```

