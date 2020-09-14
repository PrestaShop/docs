
---
title: Supply order histories
---

# Resources for Supply order histories


### Supply_order_history

|          Name          |    Format    | Required | Read Only | Max size | Not filterable | Description |
| :--------------------- | :----------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_supply_order**    | isUnsignedId | true     |           |          |                |             |
| **id_employee**        | isUnsignedId | true     |           |          |                |             |
| **id_state**           | isUnsignedId | true     |           |          |                |             |
| **employee_firstname** | isName       |          |           |          |                |             |
| **employee_lastname**  | isName       |          |           |          |                |             |
| **date_add**           | isDate       | true     |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<supply_order_history>
	<id><![CDATA[]]></id>
	<id_supply_order><![CDATA[]]></id_supply_order>
	<id_employee><![CDATA[]]></id_employee>
	<id_state><![CDATA[]]></id_state>
	<employee_firstname><![CDATA[]]></employee_firstname>
	<employee_lastname><![CDATA[]]></employee_lastname>
	<date_add><![CDATA[]]></date_add>
</supply_order_history>
</prestashop>

```

