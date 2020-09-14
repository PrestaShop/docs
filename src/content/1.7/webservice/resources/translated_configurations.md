---
title: Translated configurations
---

# Resources for Translated configurations

### Translated_configuration

|       Name        |    Format    | Required | Read Only | Max size | Not filterable | Description |
| :---------------- | :----------- | :------- | :-------- | :------- | :------------- | :---------- |
| **value**         |              |          |           |          |                |             |
| **date_add**      | isDate       |          |           |          |                |             |
| **date_upd**      | isDate       |          |           |          |                |             |
| **name**          | isConfigName | true     |           | 32       |                |             |
| **id_shop_group** | isUnsignedId |          |           |          |                |             |
| **id_shop**       | isUnsignedId |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<translated_configuration>
	<id><![CDATA[]]></id>
	<value><language id="1"></language><language id="2"></language></value>
	<date_add><![CDATA[]]></date_add>
	<date_upd><![CDATA[]]></date_upd>
	<name><![CDATA[]]></name>
	<id_shop_group><![CDATA[]]></id_shop_group>
	<id_shop><![CDATA[]]></id_shop>
</translated_configuration>
</prestashop>

```

