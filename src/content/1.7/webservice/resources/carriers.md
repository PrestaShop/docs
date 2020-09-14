---
title: Carriers
---

# Resources for Carriers

### Carrier

|           Name           |    Format     | Required | Max size | Not filterable |    Description     |
| :----------------------- | :------------ | :------- | :------- | :------------- | :----------------- |
| **deleted**              | isBool        | ❌        |          |                |                    |
| **is_module**            | isBool        | ❌        |          |                |                    |
| **id_tax_rules_group**   |               | ❌        |          | true           | Tax rules group ID |
| **id_reference**         |               | ❌        |          |                | Reference ID       |
| **name**                 | isCarrierName | ✔️       | 64       |                |                    |
| **active**               | isBool        | ✔️       |          |                |                    |
| **is_free**              | isBool        | ❌        |          |                |                    |
| **url**                  | isAbsoluteUrl | ❌        |          |                |                    |
| **shipping_handling**    | isBool        | ❌        |          |                |                    |
| **shipping_external**    |               | ❌        |          |                |                    |
| **range_behavior**       | isBool        | ❌        |          |                |                    |
| **shipping_method**      | isUnsignedInt | ❌        |          |                |                    |
| **max_width**            | isUnsignedInt | ❌        |          |                |                    |
| **max_height**           | isUnsignedInt | ❌        |          |                |                    |
| **max_depth**            | isUnsignedInt | ❌        |          |                |                    |
| **max_weight**           | isFloat       | ❌        |          |                |                    |
| **grade**                | isUnsignedInt | ❌        | 1        |                |                    |
| **external_module_name** |               | ❌        | 64       |                |                    |
| **need_range**           |               | ❌        |          |                |                    |
| **position**             |               | ❌        |          |                |                    |
| **delay**                | isGenericName | ✔️       | 512      |                |                    |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <carrier>
    <id>
    </id>
    <deleted>
    </deleted>
    <is_module>
    </is_module>
    <id_tax_rules_group>
    </id_tax_rules_group>
    <id_reference>
    </id_reference>
    <name>
    </name>
    <active>
    </active>
    <is_free>
    </is_free>
    <url>
    </url>
    <shipping_handling>
    </shipping_handling>
    <shipping_external>
    </shipping_external>
    <range_behavior>
    </range_behavior>
    <shipping_method>
    </shipping_method>
    <max_width>
    </max_width>
    <max_height>
    </max_height>
    <max_depth>
    </max_depth>
    <max_weight>
    </max_weight>
    <grade>
    </grade>
    <external_module_name>
    </external_module_name>
    <need_range>
    </need_range>
    <position>
    </position>
    <delay>
      <language id="1"/>
      <language id="2"/>
    </delay>
  </carrier>
</prestashop>
```

