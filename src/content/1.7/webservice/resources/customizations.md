---
title: Customizations
---

# Resources for Customizations

### Customization

|           Name           |    Format    | Required | Read Only | Max size | Not filterable | Description |
| :----------------------- | :----------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_address_delivery**  | isUnsignedId | true     |           |          |                |             |
| **id_cart**              | isUnsignedId | true     |           |          |                |             |
| **id_product**           | isUnsignedId | true     |           |          |                |             |
| **id_product_attribute** | isUnsignedId | true     |           |          |                |             |
| **quantity**             | isUnsignedId | true     |           |          |                |             |
| **quantity_refunded**    | isUnsignedId | true     |           |          |                |             |
| **quantity_returned**    | isUnsignedId | true     |           |          |                |             |
| **in_cart**              | isBool       | true     |           |          |                |             |
| **associations**         |              |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<customization>
	<id><![CDATA[]]></id>
	<id_address_delivery><![CDATA[]]></id_address_delivery>
	<id_cart><![CDATA[]]></id_cart>
	<id_product><![CDATA[]]></id_product>
	<id_product_attribute><![CDATA[]]></id_product_attribute>
	<quantity><![CDATA[]]></quantity>
	<quantity_refunded><![CDATA[]]></quantity_refunded>
	<quantity_returned><![CDATA[]]></quantity_returned>
	<in_cart><![CDATA[]]></in_cart>
<associations>
<customized_data_text_fields>
	<customized_data_text_field>
	<id_customization_field><![CDATA[]]></id_customization_field>
	<value><![CDATA[]]></value>
	</customized_data_text_field>
</customized_data_text_fields>
<customized_data_images>
	<customized_data_image>
	<id_customization_field><![CDATA[]]></id_customization_field>
	<value><![CDATA[]]></value>
	</customized_data_image>
</customized_data_images>
</associations>
</customization>
</prestashop>

```

