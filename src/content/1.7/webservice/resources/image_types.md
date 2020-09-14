
---
title: Image types
---

# Resources for Image types


### Image_type

|       Name        |     Format      | Required | Read Only | Max size | Not filterable | Description |
| :---------------- | :-------------- | :------- | :-------- | :------- | :------------- | :---------- |
| **name**          | isImageTypeName | true     |           | 64       |                |             |
| **width**         | isImageSize     | true     |           |          |                |             |
| **height**        | isImageSize     | true     |           |          |                |             |
| **categories**    | isBool          |          |           |          |                |             |
| **products**      | isBool          |          |           |          |                |             |
| **manufacturers** | isBool          |          |           |          |                |             |
| **suppliers**     | isBool          |          |           |          |                |             |
| **stores**        | isBool          |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<image_type>
	<id><![CDATA[]]></id>
	<name><![CDATA[]]></name>
	<width><![CDATA[]]></width>
	<height><![CDATA[]]></height>
	<categories><![CDATA[]]></categories>
	<products><![CDATA[]]></products>
	<manufacturers><![CDATA[]]></manufacturers>
	<suppliers><![CDATA[]]></suppliers>
	<stores><![CDATA[]]></stores>
</image_type>
</prestashop>

```

