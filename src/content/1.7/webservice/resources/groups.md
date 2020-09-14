---
title: Groups
---

# Resources for Groups

### Group

|           Name           |        Format        | Required | Max size | Description |
| :----------------------- | :------------------- | :------- | :------- | :---------- |
| **reduction**            | isFloat              | ❌        |          |             |
| **price_display_method** | isPriceDisplayMethod | ✔️       |          |             |
| **show_prices**          | isBool               | ❌        |          |             |
| **date_add**             | isDate               | ❌        |          |             |
| **date_upd**             | isDate               | ❌        |          |             |
| **name**                 | isGenericName        | ✔️       | 32       |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <group>
    <id>
    </id>
    <reduction>
    </reduction>
    <price_display_method>
    </price_display_method>
    <show_prices>
    </show_prices>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
    <name>
      <language id="1"/>
      <language id="2"/>
    </name>
  </group>
</prestashop>
```

