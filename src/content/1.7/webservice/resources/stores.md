---
title: Stores
---

# Resources for Stores

### Store

|      Name      |       Format       | Required | Max size | Description |
| :------------- | :----------------- | :------- | :------- | :---------- |
| **id_country** | isUnsignedId       | ✔️       |          | Country ID  |
| **id_state**   | isNullOrUnsignedId | ❌        |          | State ID    |
| **hours**      | isJson             | ❌        | 65000    |             |
| **postcode**   |                    | ❌        | 12       |             |
| **city**       | isCityName         | ✔️       | 64       |             |
| **latitude**   | isCoordinate       | ❌        | 13       |             |
| **longitude**  | isCoordinate       | ❌        | 13       |             |
| **phone**      | isPhoneNumber      | ❌        | 16       |             |
| **fax**        | isPhoneNumber      | ❌        | 16       |             |
| **email**      | isEmail            | ❌        | 255      |             |
| **active**     | isBool             | ✔️       |          |             |
| **date_add**   | isDate             | ❌        |          |             |
| **date_upd**   | isDate             | ❌        |          |             |
| **name**       | isGenericName      | ✔️       | 255      |             |
| **address1**   | isAddress          | ✔️       | 255      |             |
| **address2**   | isAddress          | ❌        | 255      |             |
| **note**       | isCleanHtml        | ❌        | 65000    |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <store>
    <id>
    </id>
    <id_country>
    </id_country>
    <id_state>
    </id_state>
    <hours>
      <language id="1"/>
      <language id="2"/>
    </hours>
    <postcode>
    </postcode>
    <city>
    </city>
    <latitude>
    </latitude>
    <longitude>
    </longitude>
    <phone>
    </phone>
    <fax>
    </fax>
    <email>
    </email>
    <active>
    </active>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
    <name>
      <language id="1"/>
      <language id="2"/>
    </name>
    <address1>
      <language id="1"/>
      <language id="2"/>
    </address1>
    <address2>
      <language id="1"/>
      <language id="2"/>
    </address2>
    <note>
      <language id="1"/>
      <language id="2"/>
    </note>
  </store>
</prestashop>
```

