---
title: Tax rule groups
---

# Resources for Tax rule groups

### Tax_rule_group

|     Name     |    Format     | Required | Max size | Description |
| :----------- | :------------ | :------: | -------: | :---------- |
| **name**     | isGenericName | ✔️       | 64       |             |
| **active**   | isBool        | ❌        |          |             |
| **deleted**  | isBool        | ❌        |          |             |
| **date_add** | isDate        | ❌        |          |             |
| **date_upd** | isDate        | ❌        |          |             |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <tax_rule_group>
    <id><![CDATA[]]></id>
    <name><![CDATA[]]></name>
    <active><![CDATA[]]></active>
    <deleted><![CDATA[]]></deleted>
    <date_add><![CDATA[]]></date_add>
    <date_upd><![CDATA[]]></date_upd>
  </tax_rule_group>
</prestashop>
```

