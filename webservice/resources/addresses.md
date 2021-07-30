---
title: Addresses
---

# Resources for Addresses

### Address

|        Name         |       Format       | Required | Max size |   Description   |
| :------------------ | :----------------- | :------: | -------: | :-------------- |
| **id_customer**     | isNullOrUnsignedId | ❌        |          | Customer ID     |
| **id_manufacturer** | isNullOrUnsignedId | ❌        |          | Manufacturer ID |
| **id_supplier**     | isNullOrUnsignedId | ❌        |          | Supplier ID     |
| **id_warehouse**    | isNullOrUnsignedId | ❌        |          | Warehouse ID    |
| **id_country**      | isUnsignedId       | ✔️       |          | Country ID      |
| **id_state**        | isNullOrUnsignedId | ❌        |          | State ID        |
| **alias**           | isGenericName      | ✔️       | 32       |                 |
| **company**         | isGenericName      | ❌        | 255      |                 |
| **lastname**        | isName             | ✔️       | 255      |                 |
| **firstname**       | isName             | ✔️       | 255      |                 |
| **vat_number**      | isGenericName      | ❌        |          |                 |
| **address1**        | isAddress          | ✔️       | 128      |                 |
| **address2**        | isAddress          | ❌        | 128      |                 |
| **postcode**        | isPostCode         | ❌        | 12       |                 |
| **city**            | isCityName         | ✔️       | 64       |                 |
| **other**           | isMessage          | ❌        | 300      |                 |
| **phone**           | isPhoneNumber      | ❌        | 32       |                 |
| **phone_mobile**    | isPhoneNumber      | ❌        | 32       |                 |
| **dni**             | isDniLite          | ❌        | 16       |                 |
| **deleted**         | isBool             | ❌        |          |                 |
| **date_add**        | isDate             | ❌        |          |                 |
| **date_upd**        | isDate             | ❌        |          |                 |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <address>
    <id><![CDATA[]]></id>
    <id_customer><![CDATA[]]></id_customer>
    <id_manufacturer><![CDATA[]]></id_manufacturer>
    <id_supplier><![CDATA[]]></id_supplier>
    <id_warehouse><![CDATA[]]></id_warehouse>
    <id_country><![CDATA[]]></id_country>
    <id_state><![CDATA[]]></id_state>
    <alias><![CDATA[]]></alias>
    <company><![CDATA[]]></company>
    <lastname><![CDATA[]]></lastname>
    <firstname><![CDATA[]]></firstname>
    <vat_number><![CDATA[]]></vat_number>
    <address1><![CDATA[]]></address1>
    <address2><![CDATA[]]></address2>
    <postcode><![CDATA[]]></postcode>
    <city><![CDATA[]]></city>
    <other><![CDATA[]]></other>
    <phone><![CDATA[]]></phone>
    <phone_mobile><![CDATA[]]></phone_mobile>
    <dni><![CDATA[]]></dni>
    <deleted><![CDATA[]]></deleted>
    <date_add><![CDATA[]]></date_add>
    <date_upd><![CDATA[]]></date_upd>
  </address>
</prestashop>
```

