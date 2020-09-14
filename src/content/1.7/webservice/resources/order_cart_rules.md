
---
title: Order cart rules
---

# Resources for Order cart rules


### Order_cart_rule

|         Name         |    Format    | Required | Read Only | Max size | Not filterable | Description |
| :------------------- | :----------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_order**         | isUnsignedId | true     |           |          |                |             |
| **id_cart_rule**     | isUnsignedId | true     |           |          |                |             |
| **id_order_invoice** | isUnsignedId |          |           |          |                |             |
| **name**             | isCleanHtml  | true     |           |          |                |             |
| **value**            | isFloat      | true     |           |          |                |             |
| **value_tax_excl**   | isFloat      | true     |           |          |                |             |
| **free_shipping**    | isBool       |          |           |          |                |             |
| **deleted**          | isBool       |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<order_cart_rule>
	<id><![CDATA[]]></id>
	<id_order><![CDATA[]]></id_order>
	<id_cart_rule><![CDATA[]]></id_cart_rule>
	<id_order_invoice><![CDATA[]]></id_order_invoice>
	<name><![CDATA[]]></name>
	<value><![CDATA[]]></value>
	<value_tax_excl><![CDATA[]]></value_tax_excl>
	<free_shipping><![CDATA[]]></free_shipping>
	<deleted><![CDATA[]]></deleted>
</order_cart_rule>
</prestashop>

```

