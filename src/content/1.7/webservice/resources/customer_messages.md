---
title: Customer messages
---

# Resources for Customer messages

### Customer_message

|          Name          |    Format    | Required | Max size |    Description     |
| :--------------------- | :----------- | :------- | :------- | :----------------- |
| **id_employee**        | isUnsignedId | ❌        |          | Employee ID        |
| **id_customer_thread** |              | ❌        |          | Customer Thread ID |
| **ip_address**         | isIp2Long    | ❌        | 15       |                    |
| **message**            | isCleanHtml  | ✔️       | 16777216 |                    |
| **file_name**          |              | ❌        |          |                    |
| **user_agent**         |              | ❌        |          |                    |
| **private**            |              | ❌        |          |                    |
| **date_add**           | isDate       | ❌        |          |                    |
| **date_upd**           | isDate       | ❌        |          |                    |
| **read**               | isBool       | ❌        |          |                    |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <customer_message>
    <id>
    </id>
    <id_employee>
    </id_employee>
    <id_customer_thread>
    </id_customer_thread>
    <ip_address>
    </ip_address>
    <message>
    </message>
    <file_name>
    </file_name>
    <user_agent>
    </user_agent>
    <private>
    </private>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
    <read>
    </read>
  </customer_message>
</prestashop>
```

