---
title: Addresses
---

# Resources for Addresses

### Address

|        Name         |       Format       | Required | Read Only | Max size | Not filterable | Description |
| :------------------ | :----------------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_customer**     | isNullOrUnsignedId |          |           |          |                |             |
| **id_manufacturer** | isNullOrUnsignedId |          |           |          |                |             |
| **id_supplier**     | isNullOrUnsignedId |          |           |          |                |             |
| **id_warehouse**    | isNullOrUnsignedId |          |           |          |                |             |
| **id_country**      | isUnsignedId       | true     |           |          |                |             |
| **id_state**        | isNullOrUnsignedId |          |           |          |                |             |
| **alias**           | isGenericName      | true     |           | 32       |                |             |
| **company**         | isGenericName      |          |           | 255      |                |             |
| **lastname**        | isName             | true     |           | 255      |                |             |
| **firstname**       | isName             | true     |           | 255      |                |             |
| **vat_number**      | isGenericName      |          |           |          |                |             |
| **address1**        | isAddress          | true     |           | 128      |                |             |
| **address2**        | isAddress          |          |           | 128      |                |             |
| **postcode**        | isPostCode         |          |           | 12       |                |             |
| **city**            | isCityName         | true     |           | 64       |                |             |
| **other**           | isMessage          |          |           | 300      |                |             |
| **phone**           | isPhoneNumber      |          |           | 32       |                |             |
| **phone_mobile**    | isPhoneNumber      |          |           | 32       |                |             |
| **dni**             | isDniLite          |          |           | 16       |                |             |
| **deleted**         | isBool             |          |           |          |                |             |
| **date_add**        | isDate             |          |           |          |                |             |
| **date_upd**        | isDate             |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<address>
	<id><![CDATA[]]></id>
	<id_customer><![CDATA[]]></id_customer>
	<id_manufacturer><![CDATA[]]></id_manufacturer>
	<id_supplier><![CDATA[]]></id_supplier>
	<id_warehouse><![CDATA[]]></id_warehouse>
	<id_country><![CDATA[]]></id_country>
	<id_state><![CDATA[]]></id_state>
	<alias><![CDATA[]]></alias>
	<company><![CDATA[]]></company>
	<lastname><![CDATA[]]></lastname>
	<firstname><![CDATA[]]></firstname>
	<vat_number><![CDATA[]]></vat_number>
	<address1><![CDATA[]]></address1>
	<address2><![CDATA[]]></address2>
	<postcode><![CDATA[]]></postcode>
	<city><![CDATA[]]></city>
	<other><![CDATA[]]></other>
	<phone><![CDATA[]]></phone>
	<phone_mobile><![CDATA[]]></phone_mobile>
	<dni><![CDATA[]]></dni>
	<deleted><![CDATA[]]></deleted>
	<date_add><![CDATA[]]></date_add>
	<date_upd><![CDATA[]]></date_upd>
</address>
</prestashop>

```

