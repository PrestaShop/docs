---
title: Countries
---

# Resources for Countries

### Country

|              Name              |      Format       | Required | Read Only | Max size | Not filterable | Description |
| :----------------------------- | :---------------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_zone**                    | isUnsignedId      | true     |           |          |                |             |
| **id_currency**                | isUnsignedId      |          |           |          |                |             |
| **call_prefix**                | isInt             |          |           |          |                |             |
| **iso_code**                   | isLanguageIsoCode | true     |           | 3        |                |             |
| **active**                     | isBool            |          |           |          |                |             |
| **contains_states**            | isBool            | true     |           |          |                |             |
| **need_identification_number** | isBool            | true     |           |          |                |             |
| **need_zip_code**              | isBool            |          |           |          |                |             |
| **zip_code_format**            | isZipCodeFormat   |          |           |          |                |             |
| **display_tax_label**          | isBool            | true     |           |          |                |             |
| **name**                       | isGenericName     | true     |           | 64       |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<country>
	<id><![CDATA[]]></id>
	<id_zone><![CDATA[]]></id_zone>
	<id_currency><![CDATA[]]></id_currency>
	<call_prefix><![CDATA[]]></call_prefix>
	<iso_code><![CDATA[]]></iso_code>
	<active><![CDATA[]]></active>
	<contains_states><![CDATA[]]></contains_states>
	<need_identification_number><![CDATA[]]></need_identification_number>
	<need_zip_code><![CDATA[]]></need_zip_code>
	<zip_code_format><![CDATA[]]></zip_code_format>
	<display_tax_label><![CDATA[]]></display_tax_label>
	<name><language id="1"></language><language id="2"></language></name>
</country>
</prestashop>
```

