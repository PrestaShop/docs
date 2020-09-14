
---
title: Supply order states
---

# Resources for Supply order states


### Supply_order_state

|        Name         |    Format     | Required | Read Only | Max size | Not filterable | Description |
| :------------------ | :------------ | :------- | :-------- | :------- | :------------- | :---------- |
| **delivery_note**   | isBool        |          |           |          |                |             |
| **editable**        | isBool        |          |           |          |                |             |
| **receipt_state**   | isBool        |          |           |          |                |             |
| **pending_receipt** | isBool        |          |           |          |                |             |
| **enclosed**        | isBool        |          |           |          |                |             |
| **color**           | isColor       |          |           |          |                |             |
| **name**            | isGenericName | true     |           | 128      |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<supply_order_state>
	<id><![CDATA[]]></id>
	<delivery_note><![CDATA[]]></delivery_note>
	<editable><![CDATA[]]></editable>
	<receipt_state><![CDATA[]]></receipt_state>
	<pending_receipt><![CDATA[]]></pending_receipt>
	<enclosed><![CDATA[]]></enclosed>
	<color><![CDATA[]]></color>
	<name><language id="1"></language><language id="2"></language></name>
</supply_order_state>
</prestashop>

```

