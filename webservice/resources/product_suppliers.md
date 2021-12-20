---
title: Product suppliers
---

# Resources for Product suppliers

### Product_suppliers

|              Name              |    Format    | Required | Max size |     Description      |
| :----------------------------- | :----------- | :------: | -------: | :------------------- |
| **id_product**                 | isUnsignedId | ✔️       |          | Product ID           |
| **id_product_attribute**       | isUnsignedId | ✔️       |          | Product attribute ID |
| **id_supplier**                | isUnsignedId | ✔️       |          | Supplier ID          |
| **id_currency**                | isUnsignedId | ❌        |          | Currency ID          |
| **product_supplier_reference** | isReference  | ❌        | 64       |                      |
| **product_supplier_price_te**  | isPrice      | ❌        |          |                      |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <product_suppliers>
    <id><![CDATA[]]></id>
    <id_product><![CDATA[]]></id_product>
    <id_product_attribute><![CDATA[]]></id_product_attribute>
    <id_supplier><![CDATA[]]></id_supplier>
    <id_currency><![CDATA[]]></id_currency>
    <product_supplier_reference><![CDATA[]]></product_supplier_reference>
    <product_supplier_price_te><![CDATA[]]></product_supplier_price_te>
  </product_suppliers>
</prestashop>
```

