---
title: Stock availables
---

# Resources for Stock availables

### Stock_available

|           Name           |    Format    | Required | Read Only | Max size | Not filterable | Description |
| :----------------------- | :----------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_product**           | isUnsignedId | true     |           |          |                |             |
| **id_product_attribute** | isUnsignedId | true     |           |          |                |             |
| **id_shop**              | isUnsignedId |          |           |          |                |             |
| **id_shop_group**        | isUnsignedId |          |           |          |                |             |
| **quantity**             | isInt        | true     |           |          |                |             |
| **depends_on_stock**     | isBool       | true     |           |          |                |             |
| **out_of_stock**         | isInt        | true     |           |          |                |             |
| **location**             | isString     |          |           | 255      |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
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

