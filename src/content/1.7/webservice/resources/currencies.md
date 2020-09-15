---
title: Currencies
---

# Resources for Currencies

### Currency

|         Name         |      Format       | Required | Max size | Not filterable | Description |
| :------------------- | :---------------- | :------: | -------: | :------------- | :---------- |
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
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <currency>
    <id><![CDATA[]]></id>
    <names>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </names>
    <name><![CDATA[]]></name>
    <symbol>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </symbol>
    <iso_code><![CDATA[]]></iso_code>
    <numeric_iso_code><![CDATA[]]></numeric_iso_code>
    <precision><![CDATA[]]></precision>
    <conversion_rate><![CDATA[]]></conversion_rate>
    <deleted><![CDATA[]]></deleted>
    <active><![CDATA[]]></active>
    <unofficial><![CDATA[]]></unofficial>
    <modified><![CDATA[]]></modified>
    <pattern>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </pattern>
  </currency>
</prestashop>
```

