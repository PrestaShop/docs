
---
title: Manufacturers
---

# Resources for Manufacturers


### Manufacturer

|         Name          |    Format     | Required | Read Only | Max size | Not filterable | Description |
| :-------------------- | :------------ | :------- | :-------- | :------- | :------------- | :---------- |
| **active**            |               |          |           |          |                |             |
| **link_rewrite**      |               |          | true      |          | true           |             |
| **name**              | isCatalogName | true     |           | 64       |                |             |
| **date_add**          |               |          |           |          |                |             |
| **date_upd**          |               |          |           |          |                |             |
| **description**       | isCleanHtml   |          |           |          |                |             |
| **short_description** | isCleanHtml   |          |           |          |                |             |
| **meta_title**        | isGenericName |          |           | 255      |                |             |
| **meta_description**  | isGenericName |          |           | 512      |                |             |
| **meta_keywords**     | isGenericName |          |           |          |                |             |
| **associations**      |               |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<manufacturer>
	<id><![CDATA[]]></id>
	<active><![CDATA[]]></active>
	<name><![CDATA[]]></name>
	<date_add><![CDATA[]]></date_add>
	<date_upd><![CDATA[]]></date_upd>
	<description><language id="1"></language><language id="2"></language></description>
	<short_description><language id="1"></language><language id="2"></language></short_description>
	<meta_title><language id="1"></language><language id="2"></language></meta_title>
	<meta_description><language id="1"></language><language id="2"></language></meta_description>
	<meta_keywords><language id="1"></language><language id="2"></language></meta_keywords>
<associations>
<addresses>
	<address>
	<id><![CDATA[]]></id>
	</address>
</addresses>
</associations>
</manufacturer>
</prestashop>

```

