---
title: Supply order histories
---

# Resources for Supply order histories

### Supply_order_history

|          Name          |    Format    | Required | Description |
| :--------------------- | :----------- | :------- | :---------- |
| **id_supply_order**    | isUnsignedId | ✔️       |             |
| **id_employee**        | isUnsignedId | ✔️       | Employee ID |
| **id_state**           | isUnsignedId | ✔️       | State ID    |
| **employee_firstname** | isName       | ❌        |             |
| **employee_lastname**  | isName       | ❌        |             |
| **date_add**           | isDate       | ✔️       |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <supply_order_history>
    <id>
    </id>
    <id_supply_order>
    </id_supply_order>
    <id_employee>
    </id_employee>
    <id_state>
    </id_state>
    <employee_firstname>
    </employee_firstname>
    <employee_lastname>
    </employee_lastname>
    <date_add>
    </date_add>
  </supply_order_history>
</prestashop>
```

