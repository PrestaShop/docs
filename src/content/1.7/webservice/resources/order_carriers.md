---
title: Order carriers
---

# Resources for Order carriers

### Order_carrier

|            Name            |      Format      | Required |   Description    |
| :------------------------- | :--------------- | :------- | :--------------- |
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
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <order_carrier>
    <id>
    </id>
    <id_order>
    </id_order>
    <id_carrier>
    </id_carrier>
    <id_order_invoice>
    </id_order_invoice>
    <weight>
    </weight>
    <shipping_cost_tax_excl>
    </shipping_cost_tax_excl>
    <shipping_cost_tax_incl>
    </shipping_cost_tax_incl>
    <tracking_number>
    </tracking_number>
    <date_add>
    </date_add>
  </order_carrier>
</prestashop>
```

