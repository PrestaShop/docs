---
title: Suppliers
---

# Resources for Suppliers

### Supplier

|         Name         |    Format     | Required | Read Only | Max size | Not filterable | Description |
| :------------------- | :------------ | :------- | :-------- | :------- | :------------- | :---------- |
| **link_rewrite**     |               |          |           |          |                |             |
| **name**             | isCatalogName | true     |           | 64       |                |             |
| **active**           |               |          |           |          |                |             |
| **date_add**         | isDate        |          |           |          |                |             |
| **date_upd**         | isDate        |          |           |          |                |             |
| **description**      | isCleanHtml   |          |           |          |                |             |
| **meta_title**       | isGenericName |          |           | 255      |                |             |
| **meta_description** | isGenericName |          |           | 512      |                |             |
| **meta_keywords**    | isGenericName |          |           | 255      |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<supplier>
	<id><![CDATA[]]></id>
	<link_rewrite><![CDATA[]]></link_rewrite>
	<name><![CDATA[]]></name>
	<active><![CDATA[]]></active>
	<date_add><![CDATA[]]></date_add>
	<date_upd><![CDATA[]]></date_upd>
	<description><language id="1"></language><language id="2"></language></description>
	<meta_title><language id="1"></language><language id="2"></language></meta_title>
	<meta_description><language id="1"></language><language id="2"></language></meta_description>
	<meta_keywords><language id="1"></language><language id="2"></language></meta_keywords>
</supplier>
</prestashop>

```

