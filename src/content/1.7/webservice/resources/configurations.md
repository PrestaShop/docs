---
title: Configurations
---

# Resources for Configurations

### Configuration

|       Name        |    Format    | Required | Read Only | Max size | Not filterable | Description |
| :---------------- | :----------- | :------- | :-------- | :------- | :------------- | :---------- |
| **value**         |              |          |           |          |                |             |
| **name**          | isConfigName | true     |           | 254      |                |             |
| **id_shop_group** | isUnsignedId |          |           |          |                |             |
| **id_shop**       | isUnsignedId |          |           |          |                |             |
| **date_add**      | isDate       |          |           |          |                |             |
| **date_upd**      | isDate       |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<configuration>
	<id><![CDATA[]]></id>
	<value><![CDATA[]]></value>
	<name><![CDATA[]]></name>
	<id_shop_group><![CDATA[]]></id_shop_group>
	<id_shop><![CDATA[]]></id_shop>
	<date_add><![CDATA[]]></date_add>
	<date_upd><![CDATA[]]></date_upd>
</configuration>
</prestashop>

```

