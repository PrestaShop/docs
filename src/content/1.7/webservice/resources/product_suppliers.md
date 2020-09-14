
---
title: Product suppliers
---

# Resources for Product suppliers


### Product_supplier

|              Name              |    Format    | Required | Read Only | Max size | Not filterable | Description |
| :----------------------------- | :----------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_product**                 | isUnsignedId | true     |           |          |                |             |
| **id_product_attribute**       | isUnsignedId | true     |           |          |                |             |
| **id_supplier**                | isUnsignedId | true     |           |          |                |             |
| **id_currency**                | isUnsignedId |          |           |          |                |             |
| **product_supplier_reference** | isReference  |          |           | 64       |                |             |
| **product_supplier_price_te**  | isPrice      |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<product_supplier>
	<id><![CDATA[]]></id>
	<id_product><![CDATA[]]></id_product>
	<id_product_attribute><![CDATA[]]></id_product_attribute>
	<id_supplier><![CDATA[]]></id_supplier>
	<id_currency><![CDATA[]]></id_currency>
	<product_supplier_reference><![CDATA[]]></product_supplier_reference>
	<product_supplier_price_te><![CDATA[]]></product_supplier_price_te>
</product_supplier>
</prestashop>

```

