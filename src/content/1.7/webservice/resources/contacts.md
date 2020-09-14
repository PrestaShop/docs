---
title: Contacts
---

# Resources for Contacts

### Contact

|         Name         |    Format     | Required | Read Only | Max size | Not filterable | Description |
| :------------------- | :------------ | :------- | :-------- | :------- | :------------- | :---------- |
| **email**            | isEmail       |          |           | 255      |                |             |
| **customer_service** | isBool        |          |           |          |                |             |
| **name**             | isGenericName | true     |           | 255      |                |             |
| **description**      | isCleanHtml   |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<contact>
	<id><![CDATA[]]></id>
	<email><![CDATA[]]></email>
	<customer_service><![CDATA[]]></customer_service>
	<name><language id="1"></language><language id="2"></language></name>
	<description><language id="1"></language><language id="2"></language></description>
</contact>
</prestashop>

```

