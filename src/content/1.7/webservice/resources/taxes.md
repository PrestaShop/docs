
---
title: Taxes
---

# Resources for Taxes


### Tax

|    Name     |    Format     | Required | Read Only | Max size | Not filterable | Description |
| :---------- | :------------ | :------- | :-------- | :------- | :------------- | :---------- |
| **rate**    | isFloat       | true     |           |          |                |             |
| **active**  |               |          |           |          |                |             |
| **deleted** |               |          |           |          |                |             |
| **name**    | isGenericName | true     |           | 32       |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<tax>
	<id><![CDATA[]]></id>
	<rate><![CDATA[]]></rate>
	<active><![CDATA[]]></active>
	<deleted><![CDATA[]]></deleted>
	<name><language id="1"></language><language id="2"></language></name>
</tax>
</prestashop>

```

