---
title: Messages
---

# Resources for Messages

### Message

|      Name       |    Format    | Required | Read Only | Max size | Not filterable | Description |
| :-------------- | :----------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_cart**     | isUnsignedId |          |           |          |                |             |
| **id_order**    | isUnsignedId |          |           |          |                |             |
| **id_customer** | isUnsignedId |          |           |          |                |             |
| **id_employee** | isUnsignedId |          |           |          |                |             |
| **message**     | isCleanHtml  | true     |           | 1600     |                |             |
| **private**     | isBool       |          |           |          |                |             |
| **date_add**    | isDate       |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<message>
	<id><![CDATA[]]></id>
	<id_cart><![CDATA[]]></id_cart>
	<id_order><![CDATA[]]></id_order>
	<id_customer><![CDATA[]]></id_customer>
	<id_employee><![CDATA[]]></id_employee>
	<message><![CDATA[]]></message>
	<private><![CDATA[]]></private>
	<date_add><![CDATA[]]></date_add>
</message>
</prestashop>
```

