
---
title: Content management system
---

# Resources for Content management system


### Content

|         Name         |    Format     | Required | Read Only |   Max size    | Not filterable | Description |
| :------------------- | :------------ | :------- | :-------- | :------------ | :------------- | :---------- |
| **id_cms_category**  | isUnsignedInt |          |           |               |                |             |
| **position**         |               |          |           |               |                |             |
| **indexation**       |               |          |           |               |                |             |
| **active**           |               |          |           |               |                |             |
| **meta_description** | isGenericName |          |           | 512           |                |             |
| **meta_keywords**    | isGenericName |          |           | 255           |                |             |
| **meta_title**       | isGenericName | true     |           | 255           |                |             |
| **head_seo_title**   | isGenericName |          |           | 255           |                |             |
| **link_rewrite**     | isLinkRewrite | true     |           | 128           |                |             |
| **content**          | isCleanHtml   |          |           | 3999999999999 |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<content>
	<id><![CDATA[]]></id>
	<id_cms_category><![CDATA[]]></id_cms_category>
	<position><![CDATA[]]></position>
	<indexation><![CDATA[]]></indexation>
	<active><![CDATA[]]></active>
	<meta_description><language id="1"></language><language id="2"></language></meta_description>
	<meta_keywords><language id="1"></language><language id="2"></language></meta_keywords>
	<meta_title><language id="1"></language><language id="2"></language></meta_title>
	<head_seo_title><language id="1"></language><language id="2"></language></head_seo_title>
	<link_rewrite><language id="1"></language><language id="2"></language></link_rewrite>
	<content><language id="1"></language><language id="2"></language></content>
</content>
</prestashop>

```

