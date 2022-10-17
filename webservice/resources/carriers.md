---
title: Carriers
---

# Resources for Carriers

### Carrier

| Name                     | Format        | Required | Max size | Not filterable | Description                                                                                           |
|--------------------------|---------------|----------|----------|----------------|-------------------------------------------------------------------------------------------------------|
| **deleted**              | isBool        | ❌        |          |                |                                                                                                       |
| **is_module**            | isBool        | ❌        |          |                |                                                                                                       |
| **id_tax_rules_group**   |               | ❌        |          | true           | Tax rules group ID                                                                                    |
| **id_reference**         |               | ❌        |          |                | Reference ID                                                                                          |
| **name**                 | isCarrierName | ✔️       | 64       |                |                                                                                                       |
| **active**               | isBool        | ✔️       |          |                |                                                                                                       |
| **is_free**              | isBool        | ❌        |          |                |                                                                                                       |
| **url**                  | isAbsoluteUrl | ❌        |          |                |                                                                                                       |
| **shipping_handling**    | isBool        | ❌        |          |                | Defines if extra shipping handling cost should be applied to this Carrier                             |
| **shipping_external**    |               | ❌        |          |                | Defines if external module calculates shipping cost                                                   |
| **range_behavior**       | isBool        | ❌        |          |                | Defines out-of-range behavior for weight, `true`=disable carrier, `false`=apply highest defined range |
| **shipping_method**      | isUnsignedInt | ❌        |          |                | Calculation method : by weight, by price, or free                                                     |
| **max_width**            | isUnsignedInt | ❌        |          |                |                                                                                                       |
| **max_height**           | isUnsignedInt | ❌        |          |                |                                                                                                       |
| **max_depth**            | isUnsignedInt | ❌        |          |                |                                                                                                       |
| **max_weight**           | isFloat       | ❌        |          |                |                                                                                                       |
| **grade**                | isUnsignedInt | ❌        | 1        |                |                                                                                                       |
| **external_module_name** |               | ❌        | 64       |                | Name of the external module in charge of calculating the shipping cost                                |
| **need_range**           |               | ❌        |          |                | Defines if module needs core range-based shipping cost to calculate final cost                        |
| **position**             |               | ❌        |          |                |                                                                                                       |
| **delay**                | isGenericName | ✔️       | 512      |                |                                                                                                       |

### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <carrier>
    <id><![CDATA[]]></id>
    <deleted><![CDATA[]]></deleted>
    <is_module><![CDATA[]]></is_module>
    <id_tax_rules_group><![CDATA[]]></id_tax_rules_group>
    <id_reference><![CDATA[]]></id_reference>
    <name><![CDATA[]]></name>
    <active><![CDATA[]]></active>
    <is_free><![CDATA[]]></is_free>
    <url><![CDATA[]]></url>
    <shipping_handling><![CDATA[]]></shipping_handling>
    <shipping_external><![CDATA[]]></shipping_external>
    <range_behavior><![CDATA[]]></range_behavior>
    <shipping_method><![CDATA[]]></shipping_method>
    <max_width><![CDATA[]]></max_width>
    <max_height><![CDATA[]]></max_height>
    <max_depth><![CDATA[]]></max_depth>
    <max_weight><![CDATA[]]></max_weight>
    <grade><![CDATA[]]></grade>
    <external_module_name><![CDATA[]]></external_module_name>
    <need_range><![CDATA[]]></need_range>
    <position><![CDATA[]]></position>
    <delay>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </delay>
  </carrier>
</prestashop>
```

