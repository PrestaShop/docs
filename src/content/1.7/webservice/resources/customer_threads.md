---
title: Customer threads
---

# Resources for Customer threads

### Customer_thread

|       Name       |    Format     | Required | Read Only | Max size | Not filterable | Description |
| :--------------- | :------------ | :------- | :-------- | :------- | :------------- | :---------- |
| **id_lang**      | isUnsignedId  | true     |           |          |                |             |
| **id_shop**      | isUnsignedId  |          |           |          |                |             |
| **id_customer**  | isUnsignedId  |          |           |          |                |             |
| **id_order**     | isUnsignedId  |          |           |          |                |             |
| **id_product**   | isUnsignedId  |          |           |          |                |             |
| **id_contact**   | isUnsignedId  | true     |           |          |                |             |
| **email**        | isEmail       |          |           | 255      |                |             |
| **token**        | isGenericName | true     |           |          |                |             |
| **status**       |               |          |           |          |                |             |
| **date_add**     | isDate        |          |           |          |                |             |
| **date_upd**     | isDate        |          |           |          |                |             |
| **associations** |               |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<customer_thread>
	<id><![CDATA[]]></id>
	<id_lang><![CDATA[]]></id_lang>
	<id_shop><![CDATA[]]></id_shop>
	<id_customer><![CDATA[]]></id_customer>
	<id_order><![CDATA[]]></id_order>
	<id_product><![CDATA[]]></id_product>
	<id_contact><![CDATA[]]></id_contact>
	<email><![CDATA[]]></email>
	<token><![CDATA[]]></token>
	<status><![CDATA[]]></status>
	<date_add><![CDATA[]]></date_add>
	<date_upd><![CDATA[]]></date_upd>
<associations>
<customer_messages>
	<customer_message>
	<id><![CDATA[]]></id>
	</customer_message>
</customer_messages>
</associations>
</customer_thread>
</prestashop>

```

