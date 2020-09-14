---
title: Languages
---

# Resources for Languages

### Language

|         Name         |      Format       | Required | Max size | Description |
| :------------------- | :---------------- | :------- | :------- | :---------- |
| **name**             | isGenericName     | ✔️       | 32       |             |
| **iso_code**         | isLanguageIsoCode | ✔️       | 2        |             |
| **locale**           | isLocale          | ❌        | 5        |             |
| **language_code**    | isLanguageCode    | ❌        | 5        |             |
| **active**           | isBool            | ❌        |          |             |
| **is_rtl**           | isBool            | ❌        |          |             |
| **date_format_lite** | isPhpDateFormat   | ✔️       | 32       |             |
| **date_format_full** | isPhpDateFormat   | ✔️       | 32       |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <language>
    <id>
    </id>
    <name>
    </name>
    <iso_code>
    </iso_code>
    <locale>
    </locale>
    <language_code>
    </language_code>
    <active>
    </active>
    <is_rtl>
    </is_rtl>
    <date_format_lite>
    </date_format_lite>
    <date_format_full>
    </date_format_full>
  </language>
</prestashop>
```

