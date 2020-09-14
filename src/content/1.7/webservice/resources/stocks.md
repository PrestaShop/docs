
---
title: Stocks
---

# Resources for Stocks


### Stock

|           Name           |    Format     | Required | Read Only | Max size | Not filterable | Description |
| :----------------------- | :------------ | :------- | :-------- | :------- | :------------- | :---------- |
| **id_warehouse**         | isUnsignedId  | true     |           |          |                |             |
| **id_product**           | isUnsignedId  | true     |           |          |                |             |
| **id_product_attribute** | isUnsignedId  | true     |           |          |                |             |
| **real_quantity**        |               |          | true      |          | true           |             |
| **reference**            | isReference   |          |           |          |                |             |
| **ean13**                | isEan13       |          |           |          |                |             |
| **isbn**                 | isIsbn        |          |           |          |                |             |
| **upc**                  | isUpc         |          |           |          |                |             |
| **mpn**                  | isMpn         |          |           |          |                |             |
| **physical_quantity**    | isUnsignedInt | true     |           |          |                |             |
| **usable_quantity**      | isInt         | true     |           |          |                |             |
| **price_te**             | isPrice       | true     |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<stock>
	<id><![CDATA[]]></id>
	<id_warehouse><![CDATA[]]></id_warehouse>
	<id_product><![CDATA[]]></id_product>
	<id_product_attribute><![CDATA[]]></id_product_attribute>
	<reference><![CDATA[]]></reference>
	<ean13><![CDATA[]]></ean13>
	<isbn><![CDATA[]]></isbn>
	<upc><![CDATA[]]></upc>
	<mpn><![CDATA[]]></mpn>
	<physical_quantity><![CDATA[]]></physical_quantity>
	<usable_quantity><![CDATA[]]></usable_quantity>
	<price_te><![CDATA[]]></price_te>
</stock>
</prestashop>

```

