---
title: Specific prices
---

# Resources for Specific prices

### Specific_price

|            Name            |     Format      | Required | Read Only | Max size | Not filterable | Description |
| :------------------------- | :-------------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_shop_group**          | isUnsignedId    |          |           |          |                |             |
| **id_shop**                | isUnsignedId    | true     |           |          |                |             |
| **id_cart**                | isUnsignedId    | true     |           |          |                |             |
| **id_product**             | isUnsignedId    | true     |           |          |                |             |
| **id_product_attribute**   | isUnsignedId    |          |           |          |                |             |
| **id_currency**            | isUnsignedId    | true     |           |          |                |             |
| **id_country**             | isUnsignedId    | true     |           |          |                |             |
| **id_group**               | isUnsignedId    | true     |           |          |                |             |
| **id_customer**            | isUnsignedId    | true     |           |          |                |             |
| **id_specific_price_rule** | isUnsignedId    |          |           |          |                |             |
| **price**                  | isNegativePrice | true     |           |          |                |             |
| **from_quantity**          | isUnsignedInt   | true     |           |          |                |             |
| **reduction**              | isPrice         | true     |           |          |                |             |
| **reduction_tax**          | isBool          | true     |           |          |                |             |
| **reduction_type**         | isReductionType | true     |           |          |                |             |
| **from**                   | isDateFormat    | true     |           |          |                |             |
| **to**                     | isDateFormat    | true     |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<specific_price>
	<id><![CDATA[]]></id>
	<id_shop_group><![CDATA[]]></id_shop_group>
	<id_shop><![CDATA[]]></id_shop>
	<id_cart><![CDATA[]]></id_cart>
	<id_product><![CDATA[]]></id_product>
	<id_product_attribute><![CDATA[]]></id_product_attribute>
	<id_currency><![CDATA[]]></id_currency>
	<id_country><![CDATA[]]></id_country>
	<id_group><![CDATA[]]></id_group>
	<id_customer><![CDATA[]]></id_customer>
	<id_specific_price_rule><![CDATA[]]></id_specific_price_rule>
	<price><![CDATA[]]></price>
	<from_quantity><![CDATA[]]></from_quantity>
	<reduction><![CDATA[]]></reduction>
	<reduction_tax><![CDATA[]]></reduction_tax>
	<reduction_type><![CDATA[]]></reduction_type>
	<from><![CDATA[]]></from>
	<to><![CDATA[]]></to>
</specific_price>
</prestashop>

```

