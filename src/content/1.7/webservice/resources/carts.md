---
title: Carts
---

# Resources for Carts

### Cart

|            Name             |    Format    | Required | Read Only | Max size | Not filterable | Description |
| :-------------------------- | :----------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_address_delivery**     | isUnsignedId |          |           |          |                |             |
| **id_address_invoice**      | isUnsignedId |          |           |          |                |             |
| **id_currency**             | isUnsignedId | true     |           |          |                |             |
| **id_customer**             | isUnsignedId |          |           |          |                |             |
| **id_guest**                | isUnsignedId |          |           |          |                |             |
| **id_lang**                 | isUnsignedId | true     |           |          |                |             |
| **id_shop_group**           | isUnsignedId |          |           |          |                |             |
| **id_shop**                 | isUnsignedId |          |           |          |                |             |
| **id_carrier**              | isUnsignedId |          |           |          |                |             |
| **recyclable**              | isBool       |          |           |          |                |             |
| **gift**                    | isBool       |          |           |          |                |             |
| **gift_message**            | isMessage    |          |           |          |                |             |
| **mobile_theme**            | isBool       |          |           |          |                |             |
| **delivery_option**         |              |          |           |          |                |             |
| **secure_key**              |              |          |           | 32       |                |             |
| **allow_seperated_package** | isBool       |          |           |          |                |             |
| **date_add**                | isDate       |          |           |          |                |             |
| **date_upd**                | isDate       |          |           |          |                |             |
| **associations**            |              |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<cart>
	<id><![CDATA[]]></id>
	<id_address_delivery><![CDATA[]]></id_address_delivery>
	<id_address_invoice><![CDATA[]]></id_address_invoice>
	<id_currency><![CDATA[]]></id_currency>
	<id_customer><![CDATA[]]></id_customer>
	<id_guest><![CDATA[]]></id_guest>
	<id_lang><![CDATA[]]></id_lang>
	<id_shop_group><![CDATA[]]></id_shop_group>
	<id_shop><![CDATA[]]></id_shop>
	<id_carrier><![CDATA[]]></id_carrier>
	<recyclable><![CDATA[]]></recyclable>
	<gift><![CDATA[]]></gift>
	<gift_message><![CDATA[]]></gift_message>
	<mobile_theme><![CDATA[]]></mobile_theme>
	<delivery_option><![CDATA[]]></delivery_option>
	<secure_key><![CDATA[]]></secure_key>
	<allow_seperated_package><![CDATA[]]></allow_seperated_package>
	<date_add><![CDATA[]]></date_add>
	<date_upd><![CDATA[]]></date_upd>
<associations>
<cart_rows>
	<cart_row>
	<id_product><![CDATA[]]></id_product>
	<id_product_attribute><![CDATA[]]></id_product_attribute>
	<id_address_delivery><![CDATA[]]></id_address_delivery>
	<id_customization><![CDATA[]]></id_customization>
	<quantity><![CDATA[]]></quantity>
	</cart_row>
</cart_rows>
</associations>
</cart>
</prestashop>
```

