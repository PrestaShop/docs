
---
title: Order payments
---

# Resources for Order payments


### Order_payment

|        Name         |    Format     | Required | Read Only | Max size | Not filterable | Description |
| :------------------ | :------------ | :------- | :-------- | :------- | :------------- | :---------- |
| **order_reference** | isAnything    |          |           | 9        |                |             |
| **id_currency**     | isUnsignedId  | true     |           |          |                |             |
| **amount**          | isPrice       | true     |           |          |                |             |
| **payment_method**  | isGenericName |          |           |          |                |             |
| **conversion_rate** | isFloat       |          |           |          |                |             |
| **transaction_id**  | isAnything    |          |           | 254      |                |             |
| **card_number**     | isAnything    |          |           | 254      |                |             |
| **card_brand**      | isAnything    |          |           | 254      |                |             |
| **card_expiration** | isAnything    |          |           | 254      |                |             |
| **card_holder**     | isAnything    |          |           | 254      |                |             |
| **date_add**        | isDate        |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<order_payment>
	<id><![CDATA[]]></id>
	<order_reference><![CDATA[]]></order_reference>
	<id_currency><![CDATA[]]></id_currency>
	<amount><![CDATA[]]></amount>
	<payment_method><![CDATA[]]></payment_method>
	<conversion_rate><![CDATA[]]></conversion_rate>
	<transaction_id><![CDATA[]]></transaction_id>
	<card_number><![CDATA[]]></card_number>
	<card_brand><![CDATA[]]></card_brand>
	<card_expiration><![CDATA[]]></card_expiration>
	<card_holder><![CDATA[]]></card_holder>
	<date_add><![CDATA[]]></date_add>
</order_payment>
</prestashop>

```

