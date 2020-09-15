---
title: Messages
---

# Resources for Messages

### Message

|      Name       |    Format    | Required | Max size | Description |
| :-------------- | :----------- | :------: | -------: | :---------- |
| **id_cart**     | isUnsignedId | ❌        |          | Cart ID     |
| **id_order**    | isUnsignedId | ❌        |          | Order ID    |
| **id_customer** | isUnsignedId | ❌        |          | Customer ID |
| **id_employee** | isUnsignedId | ❌        |          | Employee ID |
| **message**     | isCleanHtml  | ✔️       | 1600     |             |
| **private**     | isBool       | ❌        |          |             |
| **date_add**    | isDate       | ❌        |          |             |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <message>
    <id><![CDATA[]]></id>
    <id_cart><![CDATA[]]></id_cart>
    <id_order><![CDATA[]]></id_order>
    <id_customer><![CDATA[]]></id_customer>
    <id_employee><![CDATA[]]></id_employee>
    <message><![CDATA[]]></message>
    <private><![CDATA[]]></private>
    <date_add><![CDATA[]]></date_add>
  </message>
</prestashop>
```

