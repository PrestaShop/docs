---
title: Countries
---

# Resources for Countries

### Country

|              Name              |      Format       | Required | Max size | Description |
| :----------------------------- | :---------------- | :------: | -------: | :---------- |
| **id_zone**                    | isUnsignedId      | ✔️       |          | Zone ID     |
| **id_currency**                | isUnsignedId      | ❌        |          | Currency ID |
| **call_prefix**                | isInt             | ❌        |          |             |
| **iso_code**                   | isLanguageIsoCode | ✔️       | 3        |             |
| **active**                     | isBool            | ❌        |          |             |
| **contains_states**            | isBool            | ✔️       |          |             |
| **need_identification_number** | isBool            | ✔️       |          |             |
| **need_zip_code**              | isBool            | ❌        |          |             |
| **zip_code_format**            | isZipCodeFormat   | ❌        |          |             |
| **display_tax_label**          | isBool            | ✔️       |          |             |
| **name**                       | isGenericName     | ✔️       | 64       |             |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <country>
    <id><![CDATA[]]></id>
    <id_zone><![CDATA[]]></id_zone>
    <id_currency><![CDATA[]]></id_currency>
    <call_prefix><![CDATA[]]></call_prefix>
    <iso_code><![CDATA[]]></iso_code>
    <active><![CDATA[]]></active>
    <contains_states><![CDATA[]]></contains_states>
    <need_identification_number><![CDATA[]]></need_identification_number>
    <need_zip_code><![CDATA[]]></need_zip_code>
    <zip_code_format><![CDATA[]]></zip_code_format>
    <display_tax_label><![CDATA[]]></display_tax_label>
    <name>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </name>
  </country>
</prestashop>
```

