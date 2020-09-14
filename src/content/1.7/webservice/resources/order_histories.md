---
title: Order histories
---

# Resources for Order histories

### Order_history

|        Name        |    Format    | Required | Description |
| :----------------- | :----------- | :------- | :---------- |
| **id_employee**    | isUnsignedId | ❌        | Employee ID |
| **id_order_state** | isUnsignedId | ✔️       |             |
| **id_order**       | isUnsignedId | ✔️       | Order ID    |
| **date_add**       | isDate       | ❌        |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <order_history>
    <id>
    </id>
    <id_employee>
    </id_employee>
    <id_order_state>
    </id_order_state>
    <id_order>
    </id_order>
    <date_add>
    </date_add>
  </order_history>
</prestashop>
```

