---
title: Product option values
---

# Resources for Product option values

### Product_option_value

|          Name          |    Format     | Required | Read Only | Max size | Not filterable | Description |
| :--------------------- | :------------ | :------- | :-------- | :------- | :------------- | :---------- |
| **id_attribute_group** | isUnsignedId  | true     |           |          |                |             |
| **color**              | isColor       |          |           |          |                |             |
| **position**           | isInt         |          |           |          |                |             |
| **name**               | isGenericName | true     |           | 128      |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<product_option_value>
	<id><![CDATA[]]></id>
	<id_attribute_group><![CDATA[]]></id_attribute_group>
	<color><![CDATA[]]></color>
	<position><![CDATA[]]></position>
	<name><language id="1"></language><language id="2"></language></name>
</product_option_value>
</prestashop>

```

