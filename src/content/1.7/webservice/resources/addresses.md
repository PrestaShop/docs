---
title: Addresses
---

# Resources for Addresses

### Address

|        Name         |       Format       | Required | Max size |   Description   |
| :------------------ | :----------------- | :------- | :------- | :-------------- |
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
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <address>
    <id>
    </id>
    <id_customer>
    </id_customer>
    <id_manufacturer>
    </id_manufacturer>
    <id_supplier>
    </id_supplier>
    <id_warehouse>
    </id_warehouse>
    <id_country>
    </id_country>
    <id_state>
    </id_state>
    <alias>
    </alias>
    <company>
    </company>
    <lastname>
    </lastname>
    <firstname>
    </firstname>
    <vat_number>
    </vat_number>
    <address1>
    </address1>
    <address2>
    </address2>
    <postcode>
    </postcode>
    <city>
    </city>
    <other>
    </other>
    <phone>
    </phone>
    <phone_mobile>
    </phone_mobile>
    <dni>
    </dni>
    <deleted>
    </deleted>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
  </address>
</prestashop>
```

