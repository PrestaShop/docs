---
title: Supply order receipt histories
---

# Resources for Supply order receipt histories

### Supply_order_receipt_history

|            Name            |    Format     | Required | Description |
| :------------------------- | :------------ | :------- | :---------- |
| **id_supply_order_detail** | isUnsignedId  | ✔️       |             |
| **id_employee**            | isUnsignedId  | ✔️       | Employee ID |
| **id_supply_order_state**  | isUnsignedId  | ✔️       |             |
| **employee_firstname**     | isName        | ❌        |             |
| **employee_lastname**      | isName        | ❌        |             |
| **quantity**               | isUnsignedInt | ✔️       |             |
| **date_add**               | isDate        | ❌        |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <supply_order_receipt_history>
    <id>
    </id>
    <id_supply_order_detail>
    </id_supply_order_detail>
    <id_employee>
    </id_employee>
    <id_supply_order_state>
    </id_supply_order_state>
    <employee_firstname>
    </employee_firstname>
    <employee_lastname>
    </employee_lastname>
    <quantity>
    </quantity>
    <date_add>
    </date_add>
  </supply_order_receipt_history>
</prestashop>
```

