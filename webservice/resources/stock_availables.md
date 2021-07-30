---
title: Stock availables
---

# Resources for Stock availables

### Stock_available

|           Name           |    Format    | Required | Max size |     Description      |
| :----------------------- | :----------- | :------: | -------: | :------------------- |
| **id_product**           | isUnsignedId | ✔️       |          | Product ID           |
| **id_product_attribute** | isUnsignedId | ✔️       |          | Product attribute ID |
| **id_shop**              | isUnsignedId | ❌        |          | Shop ID              |
| **id_shop_group**        | isUnsignedId | ❌        |          | Shop group ID        |
| **quantity**             | isInt        | ✔️       | 10       |                      |
| **depends_on_stock**     | isBool       | ✔️       |          |                      |
| **out_of_stock**         | isInt        | ✔️       |          |                      |
| **location**             | isString     | ❌        | 255      |                      |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <stock_available>
    <id><![CDATA[]]></id>
    <id_product><![CDATA[]]></id_product>
    <id_product_attribute><![CDATA[]]></id_product_attribute>
    <id_shop><![CDATA[]]></id_shop>
    <id_shop_group><![CDATA[]]></id_shop_group>
    <quantity><![CDATA[]]></quantity>
    <depends_on_stock><![CDATA[]]></depends_on_stock>
    <out_of_stock><![CDATA[]]></out_of_stock>
    <location><![CDATA[]]></location>
  </stock_available>
</prestashop>
```

