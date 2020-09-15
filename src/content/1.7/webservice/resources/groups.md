---
title: Groups
---

# Resources for Groups

### Group

|           Name           |        Format        | Required | Max size | Description |
| :----------------------- | :------------------- | :------: | -------: | :---------- |
| **reduction**            | isFloat              | ❌        |          |             |
| **price_display_method** | isPriceDisplayMethod | ✔️       |          |             |
| **show_prices**          | isBool               | ❌        |          |             |
| **date_add**             | isDate               | ❌        |          |             |
| **date_upd**             | isDate               | ❌        |          |             |
| **name**                 | isGenericName        | ✔️       | 32       |             |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <group>
    <id><![CDATA[]]></id>
    <reduction><![CDATA[]]></reduction>
    <price_display_method><![CDATA[]]></price_display_method>
    <show_prices><![CDATA[]]></show_prices>
    <date_add><![CDATA[]]></date_add>
    <date_upd><![CDATA[]]></date_upd>
    <name>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </name>
  </group>
</prestashop>
```

