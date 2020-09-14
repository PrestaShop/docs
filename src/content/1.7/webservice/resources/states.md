---
title: States
---

# Resources for States

### State

|      Name      |     Format     | Required | Read Only | Max size | Not filterable | Description |
| :------------- | :------------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_zone**    | isUnsignedId   | true     |           |          |                |             |
| **id_country** | isUnsignedId   | true     |           |          |                |             |
| **iso_code**   | isStateIsoCode | true     |           | 7        |                |             |
| **name**       | isGenericName  | true     |           | 32       |                |             |
| **active**     | isBool         |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<state>
	<id><![CDATA[]]></id>
	<id_zone><![CDATA[]]></id_zone>
	<id_country><![CDATA[]]></id_country>
	<iso_code><![CDATA[]]></iso_code>
	<name><![CDATA[]]></name>
	<active><![CDATA[]]></active>
</state>
</prestashop>

```

