---
title: Messages
---

# Resources for Messages

### Message

|      Name       |    Format    | Required | Max size | Description |
| :-------------- | :----------- | :------- | :------- | :---------- |
| **id_cart**     | isUnsignedId | ❌        |          | Cart ID     |
| **id_order**    | isUnsignedId | ❌        |          | Order ID    |
| **id_customer** | isUnsignedId | ❌        |          | Customer ID |
| **id_employee** | isUnsignedId | ❌        |          | Employee ID |
| **message**     | isCleanHtml  | ✔️       | 1600     |             |
| **private**     | isBool       | ❌        |          |             |
| **date_add**    | isDate       | ❌        |          |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <message>
    <id>
    </id>
    <id_cart>
    </id_cart>
    <id_order>
    </id_order>
    <id_customer>
    </id_customer>
    <id_employee>
    </id_employee>
    <message>
    </message>
    <private>
    </private>
    <date_add>
    </date_add>
  </message>
</prestashop>
```

