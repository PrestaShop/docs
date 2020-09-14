
---
title: Warehouses
---

# Resources for Warehouses


### Warehouse

|        Name         |      Format       | Required | Read Only | Max size | Not filterable | Description |
| :------------------ | :---------------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_address**      | isUnsignedId      | true     |           |          |                |             |
| **id_employee**     | isUnsignedId      | true     |           |          |                |             |
| **id_currency**     | isUnsignedId      | true     |           |          |                |             |
| **valuation**       |                   |          | true      |          | true           |             |
| **deleted**         |                   |          |           |          |                |             |
| **reference**       | isString          | true     |           | 64       |                |             |
| **name**            | isString          | true     |           | 45       |                |             |
| **management_type** | isStockManagement | true     |           |          |                |             |
| **associations**    |                   |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<warehouse>
	<id><![CDATA[]]></id>
	<id_address><![CDATA[]]></id_address>
	<id_employee><![CDATA[]]></id_employee>
	<id_currency><![CDATA[]]></id_currency>
	<deleted><![CDATA[]]></deleted>
	<reference><![CDATA[]]></reference>
	<name><![CDATA[]]></name>
	<management_type><![CDATA[]]></management_type>
<associations>
<stocks>
	<stock>
	<id><![CDATA[]]></id>
	</stock>
</stocks>
<carriers>
	<carrier>
	<id><![CDATA[]]></id>
	</carrier>
</carriers>
<shops>
	<shop>
	<id><![CDATA[]]></id>
	<name><![CDATA[]]></name>
	</shop>
</shops>
</associations>
</warehouse>
</prestashop>

```

