
---
title: Categories
---

# Resources for Categories


### Category

|           Name            |    Format     | Required | Read Only | Max size | Not filterable | Description |
| :------------------------ | :------------ | :------- | :-------- | :------- | :------------- | :---------- |
| **id_parent**             | isUnsignedInt |          |           |          |                |             |
| **level_depth**           | isUnsignedInt |          | true      |          |                |             |
| **nb_products_recursive** |               |          | true      |          | true           |             |
| **active**                | isBool        | true     |           |          |                |             |
| **id_shop_default**       | isUnsignedId  |          |           |          |                |             |
| **is_root_category**      | isBool        |          |           |          |                |             |
| **position**              |               |          |           |          |                |             |
| **date_add**              | isDate        |          |           |          |                |             |
| **date_upd**              | isDate        |          |           |          |                |             |
| **name**                  | isCatalogName | true     |           | 128      |                |             |
| **link_rewrite**          | isLinkRewrite | true     |           | 128      |                |             |
| **description**           | isCleanHtml   |          |           |          |                |             |
| **meta_title**            | isGenericName |          |           | 255      |                |             |
| **meta_description**      | isGenericName |          |           | 512      |                |             |
| **meta_keywords**         | isGenericName |          |           | 255      |                |             |
| **associations**          |               |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<category>
	<id><![CDATA[]]></id>
	<id_parent><![CDATA[]]></id_parent>
	<active><![CDATA[]]></active>
	<id_shop_default><![CDATA[]]></id_shop_default>
	<is_root_category><![CDATA[]]></is_root_category>
	<position><![CDATA[]]></position>
	<date_add><![CDATA[]]></date_add>
	<date_upd><![CDATA[]]></date_upd>
	<name><language id="1"></language><language id="2"></language></name>
	<link_rewrite><language id="1"></language><language id="2"></language></link_rewrite>
	<description><language id="1"></language><language id="2"></language></description>
	<meta_title><language id="1"></language><language id="2"></language></meta_title>
	<meta_description><language id="1"></language><language id="2"></language></meta_description>
	<meta_keywords><language id="1"></language><language id="2"></language></meta_keywords>
<associations>
<categories>
	<category>
	<id><![CDATA[]]></id>
	</category>
</categories>
<products>
	<product>
	<id><![CDATA[]]></id>
	</product>
</products>
</associations>
</category>
</prestashop>

```

