---
title: Groups
---

# Resources for Groups

### Group

|           Name           |        Format        | Required | Read Only | Max size | Not filterable | Description |
| :----------------------- | :------------------- | :------- | :-------- | :------- | :------------- | :---------- |
| **reduction**            | isFloat              |          |           |          |                |             |
| **price_display_method** | isPriceDisplayMethod | true     |           |          |                |             |
| **show_prices**          | isBool               |          |           |          |                |             |
| **date_add**             | isDate               |          |           |          |                |             |
| **date_upd**             | isDate               |          |           |          |                |             |
| **name**                 | isGenericName        | true     |           | 32       |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<group>
	<id><![CDATA[]]></id>
	<reduction><![CDATA[]]></reduction>
	<price_display_method><![CDATA[]]></price_display_method>
	<show_prices><![CDATA[]]></show_prices>
	<date_add><![CDATA[]]></date_add>
	<date_upd><![CDATA[]]></date_upd>
	<name><language id="1"></language><language id="2"></language></name>
</group>
</prestashop>

```

