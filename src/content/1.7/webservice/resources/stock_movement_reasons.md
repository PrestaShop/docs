---
title: Stock movement reasons
---

# Resources for Stock movement reasons

### Stock_movement_reason

|     Name     |    Format     | Required | Read Only | Max size | Not filterable | Description |
| :----------- | :------------ | :------- | :-------- | :------- | :------------- | :---------- |
| **sign**     |               |          |           |          |                |             |
| **deleted**  |               |          |           |          |                |             |
| **date_add** | isDate        |          |           |          |                |             |
| **date_upd** | isDate        |          |           |          |                |             |
| **name**     | isGenericName | true     |           | 255      |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<stock_movement_reason>
	<id><![CDATA[]]></id>
	<sign><![CDATA[]]></sign>
	<deleted><![CDATA[]]></deleted>
	<date_add><![CDATA[]]></date_add>
	<date_upd><![CDATA[]]></date_upd>
	<name><language id="1"></language><language id="2"></language></name>
</stock_movement_reason>
</prestashop>
```

