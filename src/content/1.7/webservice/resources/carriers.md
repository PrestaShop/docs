---
title: Carriers
---

# Resources for Carriers

### Carrier

|           Name           |    Format     | Required | Max size | Not filterable |    Description     |
| :----------------------- | :------------ | :------: | -------: | :------------- | :----------------- |
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

