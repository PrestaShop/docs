---
title: Product features
---

# Resources for Product features

### Product_feature

|     Name     |    Format     | Required | Read Only | Max size | Not filterable | Description |
| :----------- | :------------ | :------- | :-------- | :------- | :------------- | :---------- |
| **position** | isInt         |          |           |          |                |             |
| **name**     | isGenericName | true     |           | 128      |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<product_feature>
	<id><![CDATA[]]></id>
	<position><![CDATA[]]></position>
	<name><language id="1"></language><language id="2"></language></name>
</product_feature>
</prestashop>
```

