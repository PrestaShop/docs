
---
title: Shops
---

# Resources for Shops


### Shop

|       Name        |    Format     | Required | Read Only | Max size | Not filterable | Description |
| :---------------- | :------------ | :------- | :-------- | :------- | :------------- | :---------- |
| **id_shop_group** |               | true     |           |          |                |             |
| **id_category**   |               | true     |           |          |                |             |
| **active**        | isBool        |          |           |          |                |             |
| **deleted**       | isBool        |          |           |          |                |             |
| **name**          | isGenericName | true     |           | 64       |                |             |
| **color**         | isColor       |          |           |          |                |             |
| **theme_name**    | isThemeName   |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<shop>
	<id><![CDATA[]]></id>
	<id_shop_group><![CDATA[]]></id_shop_group>
	<id_category><![CDATA[]]></id_category>
	<active><![CDATA[]]></active>
	<deleted><![CDATA[]]></deleted>
	<name><![CDATA[]]></name>
	<color><![CDATA[]]></color>
	<theme_name><![CDATA[]]></theme_name>
</shop>
</prestashop>

```

