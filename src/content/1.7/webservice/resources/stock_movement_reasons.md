---
title: Stock movement reasons
---

# Resources for Stock movement reasons

### Stock_movement_reason

|     Name     |    Format     | Required | Max size | Description |
| :----------- | :------------ | :------- | :------- | :---------- |
| **sign**     |               | ❌        |          |             |
| **deleted**  |               | ❌        |          |             |
| **date_add** | isDate        | ❌        |          |             |
| **date_upd** | isDate        | ❌        |          |             |
| **name**     | isGenericName | ✔️       | 255      |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <stock_movement_reason>
    <id>
    </id>
    <sign>
    </sign>
    <deleted>
    </deleted>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
    <name>
      <language id="1"/>
      <language id="2"/>
    </name>
  </stock_movement_reason>
</prestashop>
```

