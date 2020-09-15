---
title: Stores
---

# Resources for Stores

### Store

|      Name      |       Format       | Required | Max size | Description |
| :------------- | :----------------- | :------: | -------: | :---------- |
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
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <store>
    <id><![CDATA[]]></id>
    <id_country><![CDATA[]]></id_country>
    <id_state><![CDATA[]]></id_state>
    <hours>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </hours>
    <postcode><![CDATA[]]></postcode>
    <city><![CDATA[]]></city>
    <latitude><![CDATA[]]></latitude>
    <longitude><![CDATA[]]></longitude>
    <phone><![CDATA[]]></phone>
    <fax><![CDATA[]]></fax>
    <email><![CDATA[]]></email>
    <active><![CDATA[]]></active>
    <date_add><![CDATA[]]></date_add>
    <date_upd><![CDATA[]]></date_upd>
    <name>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </name>
    <address1>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </address1>
    <address2>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </address2>
    <note>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </note>
  </store>
</prestashop>
```

