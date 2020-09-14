---
title: Stores
---

# Resources for Stores

### Store

|      Name      |       Format       | Required | Read Only | Max size | Not filterable | Description |
| :------------- | :----------------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_country** | isUnsignedId       | true     |           |          |                |             |
| **id_state**   | isNullOrUnsignedId |          |           |          |                |             |
| **hours**      | isJson             |          |           | 65000    |                |             |
| **postcode**   |                    |          |           | 12       |                |             |
| **city**       | isCityName         | true     |           | 64       |                |             |
| **latitude**   | isCoordinate       |          |           | 13       |                |             |
| **longitude**  | isCoordinate       |          |           | 13       |                |             |
| **phone**      | isPhoneNumber      |          |           | 16       |                |             |
| **fax**        | isPhoneNumber      |          |           | 16       |                |             |
| **email**      | isEmail            |          |           | 255      |                |             |
| **active**     | isBool             | true     |           |          |                |             |
| **date_add**   | isDate             |          |           |          |                |             |
| **date_upd**   | isDate             |          |           |          |                |             |
| **name**       | isGenericName      | true     |           | 255      |                |             |
| **address1**   | isAddress          | true     |           | 255      |                |             |
| **address2**   | isAddress          |          |           | 255      |                |             |
| **note**       | isCleanHtml        |          |           | 65000    |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<store>
	<id><![CDATA[]]></id>
	<id_country><![CDATA[]]></id_country>
	<id_state><![CDATA[]]></id_state>
	<hours><language id="1"></language><language id="2"></language></hours>
	<postcode><![CDATA[]]></postcode>
	<city><![CDATA[]]></city>
	<latitude><![CDATA[]]></latitude>
	<longitude><![CDATA[]]></longitude>
	<phone><![CDATA[]]></phone>
	<fax><![CDATA[]]></fax>
	<email><![CDATA[]]></email>
	<active><![CDATA[]]></active>
	<date_add><![CDATA[]]></date_add>
	<date_upd><![CDATA[]]></date_upd>
	<name><language id="1"></language><language id="2"></language></name>
	<address1><language id="1"></language><language id="2"></language></address1>
	<address2><language id="1"></language><language id="2"></language></address2>
	<note><language id="1"></language><language id="2"></language></note>
</store>
</prestashop>

```

