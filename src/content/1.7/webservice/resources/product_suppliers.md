---
title: Product suppliers
---

# Resources for Product suppliers

### Product_supplier

|              Name              |    Format    | Required | Max size |     Description      |
| :----------------------------- | :----------- | :------- | :------- | :------------------- |
| **id_product**                 | isUnsignedId | ✔️       |          | Product ID           |
| **id_product_attribute**       | isUnsignedId | ✔️       |          | Product attribute ID |
| **id_supplier**                | isUnsignedId | ✔️       |          | Supplier ID          |
| **id_currency**                | isUnsignedId | ❌        |          | Currency ID          |
| **product_supplier_reference** | isReference  | ❌        | 64       |                      |
| **product_supplier_price_te**  | isPrice      | ❌        |          |                      |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <product_supplier>
    <id>
    </id>
    <id_product>
    </id_product>
    <id_product_attribute>
    </id_product_attribute>
    <id_supplier>
    </id_supplier>
    <id_currency>
    </id_currency>
    <product_supplier_reference>
    </product_supplier_reference>
    <product_supplier_price_te>
    </product_supplier_price_te>
  </product_supplier>
</prestashop>
```

