---
title: Product customization fields
---

# Resources for Product customization fields

### Customization_field

|      Name      |    Format    | Required | Read Only | Max size | Not filterable | Description |
| :------------- | :----------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_product** | isUnsignedId | true     |           |          |                |             |
| **type**       | isUnsignedId | true     |           |          |                |             |
| **required**   | isBool       | true     |           |          |                |             |
| **is_module**  | isBool       |          |           |          |                |             |
| **is_deleted** | isBool       |          |           |          |                |             |
| **name**       |              | true     |           | 255      |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<customization_field>
	<id><![CDATA[]]></id>
	<id_product><![CDATA[]]></id_product>
	<type><![CDATA[]]></type>
	<required><![CDATA[]]></required>
	<is_module><![CDATA[]]></is_module>
	<is_deleted><![CDATA[]]></is_deleted>
	<name><language id="1"></language><language id="2"></language></name>
</customization_field>
</prestashop>

```

