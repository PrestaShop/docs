---
title: Order carriers
---

# Resources for Order carriers

### Order_carrier

|            Name            |      Format      | Required |   Description    |
| :------------------------- | :--------------- | :------: | :--------------- |
| **id_order**               | isUnsignedId     | ✔️       | Order ID         |
| **id_carrier**             | isUnsignedId     | ✔️       | Carrier ID       |
| **id_order_invoice**       | isUnsignedId     | ❌        | Order invoice ID |
| **weight**                 | isFloat          | ❌        |                  |
| **shipping_cost_tax_excl** | isFloat          | ❌        |                  |
| **shipping_cost_tax_incl** | isFloat          | ❌        |                  |
| **tracking_number**        | isTrackingNumber | ❌        |                  |
| **date_add**               | isDate           | ❌        |                  |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <order_carrier>
    <id><![CDATA[]]></id>
    <id_order><![CDATA[]]></id_order>
    <id_carrier><![CDATA[]]></id_carrier>
    <id_order_invoice><![CDATA[]]></id_order_invoice>
    <weight><![CDATA[]]></weight>
    <shipping_cost_tax_excl><![CDATA[]]></shipping_cost_tax_excl>
    <shipping_cost_tax_incl><![CDATA[]]></shipping_cost_tax_incl>
    <tracking_number><![CDATA[]]></tracking_number>
    <date_add><![CDATA[]]></date_add>
  </order_carrier>
</prestashop>
```

