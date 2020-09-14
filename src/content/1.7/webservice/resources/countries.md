---
title: Countries
---

# Resources for Countries

### Country

|              Name              |      Format       | Required | Max size | Description |
| :----------------------------- | :---------------- | :------- | :------- | :---------- |
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
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <country>
    <id>
    </id>
    <id_zone>
    </id_zone>
    <id_currency>
    </id_currency>
    <call_prefix>
    </call_prefix>
    <iso_code>
    </iso_code>
    <active>
    </active>
    <contains_states>
    </contains_states>
    <need_identification_number>
    </need_identification_number>
    <need_zip_code>
    </need_zip_code>
    <zip_code_format>
    </zip_code_format>
    <display_tax_label>
    </display_tax_label>
    <name>
      <language id="1"/>
      <language id="2"/>
    </name>
  </country>
</prestashop>
```

