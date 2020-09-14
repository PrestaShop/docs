---
title: Stock availables
---

# Resources for Stock availables

### Stock_available

|           Name           |    Format    | Required | Max size |     Description      |
| :----------------------- | :----------- | :------- | :------- | :------------------- |
| **id_product**           | isUnsignedId | ✔️       |          | Product ID           |
| **id_product_attribute** | isUnsignedId | ✔️       |          | Product attribute ID |
| **id_shop**              | isUnsignedId | ❌        |          | Shop ID              |
| **id_shop_group**        | isUnsignedId | ❌        |          | Shop group ID        |
| **quantity**             | isInt        | ✔️       |          |                      |
| **depends_on_stock**     | isBool       | ✔️       |          |                      |
| **out_of_stock**         | isInt        | ✔️       |          |                      |
| **location**             | isString     | ❌        | 255      |                      |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <stock_available>
    <id>
    </id>
    <id_product>
    </id_product>
    <id_product_attribute>
    </id_product_attribute>
    <id_shop>
    </id_shop>
    <id_shop_group>
    </id_shop_group>
    <quantity>
    </quantity>
    <depends_on_stock>
    </depends_on_stock>
    <out_of_stock>
    </out_of_stock>
    <location>
    </location>
  </stock_available>
</prestashop>
```

