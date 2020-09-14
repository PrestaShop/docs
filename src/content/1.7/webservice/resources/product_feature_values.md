---
title: Product feature values
---

# Resources for Product feature values

### Product_feature_value

|      Name      |    Format     | Required | Read Only | Max size | Not filterable | Description |
| :------------- | :------------ | :------- | :-------- | :------- | :------------- | :---------- |
| **id_feature** | isUnsignedId  | true     |           |          |                |             |
| **custom**     | isBool        |          |           |          |                |             |
| **value**      | isGenericName | true     |           | 255      |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<product_feature_value>
	<id><![CDATA[]]></id>
	<id_feature><![CDATA[]]></id_feature>
	<custom><![CDATA[]]></custom>
	<value><language id="1"></language><language id="2"></language></value>
</product_feature_value>
</prestashop>
```

