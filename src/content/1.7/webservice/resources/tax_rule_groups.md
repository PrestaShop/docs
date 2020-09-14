---
title: Tax rule groups
---

# Resources for Tax rule groups

### Tax_rule_group

|     Name     |    Format     | Required | Max size | Description |
| :----------- | :------------ | :------- | :------- | :---------- |
| **name**     | isGenericName | ✔️       | 64       |             |
| **active**   | isBool        | ❌        |          |             |
| **deleted**  | isBool        | ❌        |          |             |
| **date_add** | isDate        | ❌        |          |             |
| **date_upd** | isDate        | ❌        |          |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <tax_rule_group>
    <id>
    </id>
    <name>
    </name>
    <active>
    </active>
    <deleted>
    </deleted>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
  </tax_rule_group>
</prestashop>
```

