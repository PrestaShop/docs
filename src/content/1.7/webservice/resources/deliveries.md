---
title: Deliveries
---

# Resources for Deliveries

### Delivery

|        Name         |    Format    | Required | Read Only | Max size | Not filterable | Description |
| :------------------ | :----------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_carrier**      | isUnsignedId | true     |           |          |                |             |
| **id_range_price**  | isUnsignedId | true     |           |          |                |             |
| **id_range_weight** | isUnsignedId | true     |           |          |                |             |
| **id_zone**         | isUnsignedId | true     |           |          |                |             |
| **id_shop**         |              |          |           |          |                |             |
| **id_shop_group**   |              |          |           |          |                |             |
| **price**           | isPrice      | true     |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<delivery>
	<id><![CDATA[]]></id>
	<id_carrier><![CDATA[]]></id_carrier>
	<id_range_price><![CDATA[]]></id_range_price>
	<id_range_weight><![CDATA[]]></id_range_weight>
	<id_zone><![CDATA[]]></id_zone>
	<id_shop><![CDATA[]]></id_shop>
	<id_shop_group><![CDATA[]]></id_shop_group>
	<price><![CDATA[]]></price>
</delivery>
</prestashop>
```

