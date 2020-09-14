---
title: Warehouse product locations
---

# Resources for Warehouse product locations

### Warehouse_product_location

|           Name           |    Format    | Required | Max size |     Description      |
| :----------------------- | :----------- | :------- | :------- | :------------------- |
| **id_product**           | isUnsignedId | ✔️       |          | Product ID           |
| **id_product_attribute** | isUnsignedId | ✔️       |          | Product attribute ID |
| **id_warehouse**         | isUnsignedId | ✔️       |          | Warehouse ID         |
| **location**             | isReference  | ❌        | 64       |                      |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <warehouse_product_location>
    <id>
    </id>
    <id_product>
    </id_product>
    <id_product_attribute>
    </id_product_attribute>
    <id_warehouse>
    </id_warehouse>
    <location>
    </location>
  </warehouse_product_location>
</prestashop>
```

