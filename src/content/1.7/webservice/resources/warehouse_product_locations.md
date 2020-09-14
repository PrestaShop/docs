---
title: Warehouse product locations
---

# Resources for Warehouse product locations

### Warehouse_product_location

|           Name           |    Format    | Required | Read Only | Max size | Not filterable | Description |
| :----------------------- | :----------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_product**           | isUnsignedId | true     |           |          |                |             |
| **id_product_attribute** | isUnsignedId | true     |           |          |                |             |
| **id_warehouse**         | isUnsignedId | true     |           |          |                |             |
| **location**             | isReference  |          |           | 64       |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<warehouse_product_location>
	<id><![CDATA[]]></id>
	<id_product><![CDATA[]]></id_product>
	<id_product_attribute><![CDATA[]]></id_product_attribute>
	<id_warehouse><![CDATA[]]></id_warehouse>
	<location><![CDATA[]]></location>
</warehouse_product_location>
</prestashop>
```

