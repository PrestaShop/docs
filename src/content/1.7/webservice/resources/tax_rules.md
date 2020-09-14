---
title: Tax rules
---

# Resources for Tax rules

### Tax_rule

|          Name          |    Format     | Required | Read Only | Max size | Not filterable | Description |
| :--------------------- | :------------ | :------- | :-------- | :------- | :------------- | :---------- |
| **id_tax_rules_group** | isUnsignedId  | true     |           |          |                |             |
| **id_state**           | isUnsignedId  |          |           |          |                |             |
| **id_country**         | isUnsignedId  | true     |           |          |                |             |
| **zipcode_from**       | isPostCode    |          |           |          |                |             |
| **zipcode_to**         | isPostCode    |          |           |          |                |             |
| **id_tax**             | isUnsignedId  | true     |           |          |                |             |
| **behavior**           | isUnsignedInt |          |           |          |                |             |
| **description**        | isString      |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<tax_rule>
	<id><![CDATA[]]></id>
	<id_tax_rules_group><![CDATA[]]></id_tax_rules_group>
	<id_state><![CDATA[]]></id_state>
	<id_country><![CDATA[]]></id_country>
	<zipcode_from><![CDATA[]]></zipcode_from>
	<zipcode_to><![CDATA[]]></zipcode_to>
	<id_tax><![CDATA[]]></id_tax>
	<behavior><![CDATA[]]></behavior>
	<description><![CDATA[]]></description>
</tax_rule>
</prestashop>

```

