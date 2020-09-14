---
title: Customer messages
---

# Resources for Customer messages

### Customer_message

|          Name          |    Format    | Required | Read Only | Max size | Not filterable | Description |
| :--------------------- | :----------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_employee**        | isUnsignedId |          |           |          |                |             |
| **id_customer_thread** |              |          |           |          |                |             |
| **ip_address**         | isIp2Long    |          |           | 15       |                |             |
| **message**            | isCleanHtml  | true     |           | 16777216 |                |             |
| **file_name**          |              |          |           |          |                |             |
| **user_agent**         |              |          |           |          |                |             |
| **private**            |              |          |           |          |                |             |
| **date_add**           | isDate       |          |           |          |                |             |
| **date_upd**           | isDate       |          |           |          |                |             |
| **read**               | isBool       |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<customer_message>
	<id><![CDATA[]]></id>
	<id_employee><![CDATA[]]></id_employee>
	<id_customer_thread><![CDATA[]]></id_customer_thread>
	<ip_address><![CDATA[]]></ip_address>
	<message><![CDATA[]]></message>
	<file_name><![CDATA[]]></file_name>
	<user_agent><![CDATA[]]></user_agent>
	<private><![CDATA[]]></private>
	<date_add><![CDATA[]]></date_add>
	<date_upd><![CDATA[]]></date_upd>
	<read><![CDATA[]]></read>
</customer_message>
</prestashop>

```

