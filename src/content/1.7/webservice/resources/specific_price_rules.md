---
title: Specific price rules
---

# Resources for Specific price rules

### Specific_price_rule

|        Name        |     Format      | Required | Description |
| :----------------- | :-------------- | :------- | :---------- |
| **id_shop**        | isUnsignedId    | ✔️       | Shop ID     |
| **id_country**     | isUnsignedId    | ✔️       | Country ID  |
| **id_currency**    | isUnsignedId    | ✔️       | Currency ID |
| **id_group**       | isUnsignedId    | ✔️       |             |
| **name**           | isCleanHtml     | ✔️       |             |
| **from_quantity**  | isUnsignedInt   | ✔️       |             |
| **price**          | isNegativePrice | ✔️       |             |
| **reduction**      | isPrice         | ✔️       |             |
| **reduction_tax**  | isBool          | ✔️       |             |
| **reduction_type** | isReductionType | ✔️       |             |
| **from**           | isDateFormat    | ❌        |             |
| **to**             | isDateFormat    | ❌        |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <specific_price_rule>
    <id>
    </id>
    <id_shop>
    </id_shop>
    <id_country>
    </id_country>
    <id_currency>
    </id_currency>
    <id_group>
    </id_group>
    <name>
    </name>
    <from_quantity>
    </from_quantity>
    <price>
    </price>
    <reduction>
    </reduction>
    <reduction_tax>
    </reduction_tax>
    <reduction_type>
    </reduction_type>
    <from>
    </from>
    <to>
    </to>
  </specific_price_rule>
</prestashop>
```

