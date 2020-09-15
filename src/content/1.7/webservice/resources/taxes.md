---
title: Taxes
---

# Resources for Taxes

### Tax

|    Name     |    Format     | Required | Max size | Description |
| :---------- | :------------ | :------: | -------: | :---------- |
| **rate**    | isFloat       | ✔️       |          |             |
| **active**  |               | ❌        |          |             |
| **deleted** |               | ❌        |          |             |
| **name**    | isGenericName | ✔️       | 32       |             |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <tax>
    <id><![CDATA[]]></id>
    <rate><![CDATA[]]></rate>
    <active><![CDATA[]]></active>
    <deleted><![CDATA[]]></deleted>
    <name>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </name>
  </tax>
</prestashop>
```

