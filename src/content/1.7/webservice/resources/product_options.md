
---
title: Product options
---

# Resources for Product options


### Product_option

|        Name        |    Format     | Required | Read Only | Max size | Not filterable | Description |
| :----------------- | :------------ | :------- | :-------- | :------- | :------------- | :---------- |
| **is_color_group** | isBool        |          |           |          |                |             |
| **group_type**     |               | true     |           |          |                |             |
| **position**       | isInt         |          |           |          |                |             |
| **name**           | isGenericName | true     |           | 128      |                |             |
| **public_name**    | isGenericName | true     |           | 64       |                |             |
| **associations**   |               |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<product_option>
	<id><![CDATA[]]></id>
	<is_color_group><![CDATA[]]></is_color_group>
	<group_type><![CDATA[]]></group_type>
	<position><![CDATA[]]></position>
	<name><language id="1"></language><language id="2"></language></name>
	<public_name><language id="1"></language><language id="2"></language></public_name>
<associations>
<product_option_values>
	<product_option_value>
	<id><![CDATA[]]></id>
	</product_option_value>
</product_option_values>
</associations>
</product_option>
</prestashop>

```

