---
title: Order histories
---

# Resources for Order histories

### Order_history

|        Name        |    Format    | Required | Read Only | Max size | Not filterable | Description |
| :----------------- | :----------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_employee**    | isUnsignedId |          |           |          |                |             |
| **id_order_state** | isUnsignedId | true     |           |          |                |             |
| **id_order**       | isUnsignedId | true     |           |          |                |             |
| **date_add**       | isDate       |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<order_history>
	<id><![CDATA[]]></id>
	<id_employee><![CDATA[]]></id_employee>
	<id_order_state><![CDATA[]]></id_order_state>
	<id_order><![CDATA[]]></id_order>
	<date_add><![CDATA[]]></date_add>
</order_history>
</prestashop>

```

