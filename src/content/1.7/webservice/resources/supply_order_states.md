---
title: Supply order states
---

# Resources for Supply order states

### Supply_order_state

|        Name         |    Format     | Required | Max size | Description |
| :------------------ | :------------ | :------- | :------- | :---------- |
| **delivery_note**   | isBool        | ❌        |          |             |
| **editable**        | isBool        | ❌        |          |             |
| **receipt_state**   | isBool        | ❌        |          |             |
| **pending_receipt** | isBool        | ❌        |          |             |
| **enclosed**        | isBool        | ❌        |          |             |
| **color**           | isColor       | ❌        |          |             |
| **name**            | isGenericName | ✔️       | 128      |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <supply_order_state>
    <id>
    </id>
    <delivery_note>
    </delivery_note>
    <editable>
    </editable>
    <receipt_state>
    </receipt_state>
    <pending_receipt>
    </pending_receipt>
    <enclosed>
    </enclosed>
    <color>
    </color>
    <name>
      <language id="1"/>
      <language id="2"/>
    </name>
  </supply_order_state>
</prestashop>
```

