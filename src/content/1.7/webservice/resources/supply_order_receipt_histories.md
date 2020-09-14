
---
title: Supply order receipt histories
---

# Resources for Supply order receipt histories


### Supply_order_receipt_history

|            Name            |    Format     | Required | Read Only | Max size | Not filterable | Description |
| :------------------------- | :------------ | :------- | :-------- | :------- | :------------- | :---------- |
| **id_supply_order_detail** | isUnsignedId  | true     |           |          |                |             |
| **id_employee**            | isUnsignedId  | true     |           |          |                |             |
| **id_supply_order_state**  | isUnsignedId  | true     |           |          |                |             |
| **employee_firstname**     | isName        |          |           |          |                |             |
| **employee_lastname**      | isName        |          |           |          |                |             |
| **quantity**               | isUnsignedInt | true     |           |          |                |             |
| **date_add**               | isDate        |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<supply_order_receipt_history>
	<id><![CDATA[]]></id>
	<id_supply_order_detail><![CDATA[]]></id_supply_order_detail>
	<id_employee><![CDATA[]]></id_employee>
	<id_supply_order_state><![CDATA[]]></id_supply_order_state>
	<employee_firstname><![CDATA[]]></employee_firstname>
	<employee_lastname><![CDATA[]]></employee_lastname>
	<quantity><![CDATA[]]></quantity>
	<date_add><![CDATA[]]></date_add>
</supply_order_receipt_history>
</prestashop>

```

