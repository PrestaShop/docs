---
title: Tax rules
---

# Resources for Tax rules

### Tax_rule

|          Name          |    Format     | Required |    Description     |
| :--------------------- | :------------ | :------- | :----------------- |
| **id_tax_rules_group** | isUnsignedId  | ✔️       | Tax rules group ID |
| **id_state**           | isUnsignedId  | ❌        | State ID           |
| **id_country**         | isUnsignedId  | ✔️       | Country ID         |
| **zipcode_from**       | isPostCode    | ❌        |                    |
| **zipcode_to**         | isPostCode    | ❌        |                    |
| **id_tax**             | isUnsignedId  | ✔️       |                    |
| **behavior**           | isUnsignedInt | ❌        |                    |
| **description**        | isString      | ❌        |                    |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <tax_rule>
    <id>
    </id>
    <id_tax_rules_group>
    </id_tax_rules_group>
    <id_state>
    </id_state>
    <id_country>
    </id_country>
    <zipcode_from>
    </zipcode_from>
    <zipcode_to>
    </zipcode_to>
    <id_tax>
    </id_tax>
    <behavior>
    </behavior>
    <description>
    </description>
  </tax_rule>
</prestashop>
```

