---
title: Currencies
---

# Resources for Currencies

### Currency

|         Name         |      Format       | Required | Max size | Not filterable | Description |
| :------------------- | :---------------- | :------- | :------- | :------------- | :---------- |
| **names**            |                   | ❌        |          |                |             |
| **name**             | isGenericName     | ✔️       | 255      | true           |             |
| **symbol**           |                   | ❌        | 255      |                |             |
| **iso_code**         | isLanguageIsoCode | ✔️       | 3        |                |             |
| **numeric_iso_code** | isNumericIsoCode  | ❌        | 3        |                |             |
| **precision**        | isInt             | ❌        |          |                |             |
| **conversion_rate**  | isUnsignedFloat   | ✔️       |          |                |             |
| **deleted**          | isBool            | ❌        |          |                |             |
| **active**           | isBool            | ❌        |          |                |             |
| **unofficial**       | isBool            | ❌        |          |                |             |
| **modified**         | isBool            | ❌        |          |                |             |
| **pattern**          |                   | ❌        | 255      |                |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <currency>
    <id>
    </id>
    <names>
      <language id="1"/>
      <language id="2"/>
    </names>
    <name>
    </name>
    <symbol>
      <language id="1"/>
      <language id="2"/>
    </symbol>
    <iso_code>
    </iso_code>
    <numeric_iso_code>
    </numeric_iso_code>
    <precision>
    </precision>
    <conversion_rate>
    </conversion_rate>
    <deleted>
    </deleted>
    <active>
    </active>
    <unofficial>
    </unofficial>
    <modified>
    </modified>
    <pattern>
      <language id="1"/>
      <language id="2"/>
    </pattern>
  </currency>
</prestashop>
```

