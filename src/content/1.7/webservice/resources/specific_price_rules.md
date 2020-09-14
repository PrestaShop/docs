---
title: Specific price rules
---

# Resources for Specific price rules

### Specific_price_rule

|        Name        |     Format      | Required | Read Only | Max size | Not filterable | Description |
| :----------------- | :-------------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_shop**        | isUnsignedId    | true     |           |          |                |             |
| **id_country**     | isUnsignedId    | true     |           |          |                |             |
| **id_currency**    | isUnsignedId    | true     |           |          |                |             |
| **id_group**       | isUnsignedId    | true     |           |          |                |             |
| **name**           | isCleanHtml     | true     |           |          |                |             |
| **from_quantity**  | isUnsignedInt   | true     |           |          |                |             |
| **price**          | isNegativePrice | true     |           |          |                |             |
| **reduction**      | isPrice         | true     |           |          |                |             |
| **reduction_tax**  | isBool          | true     |           |          |                |             |
| **reduction_type** | isReductionType | true     |           |          |                |             |
| **from**           | isDateFormat    |          |           |          |                |             |
| **to**             | isDateFormat    |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<specific_price_rule>
	<id><![CDATA[]]></id>
	<id_shop><![CDATA[]]></id_shop>
	<id_country><![CDATA[]]></id_country>
	<id_currency><![CDATA[]]></id_currency>
	<id_group><![CDATA[]]></id_group>
	<name><![CDATA[]]></name>
	<from_quantity><![CDATA[]]></from_quantity>
	<price><![CDATA[]]></price>
	<reduction><![CDATA[]]></reduction>
	<reduction_tax><![CDATA[]]></reduction_tax>
	<reduction_type><![CDATA[]]></reduction_type>
	<from><![CDATA[]]></from>
	<to><![CDATA[]]></to>
</specific_price_rule>
</prestashop>

```

