---
title: Customer messages
---

# Resources for Customer messages

### Customer_message

|          Name          |    Format    | Required | Max size |    Description     |
| :--------------------- | :----------- | :------: | -------: | :----------------- |
| **id_employee**        | isUnsignedId | ❌        |          | Employee ID        |
| **id_customer_thread** |              | ❌        |          | Customer Thread ID |
| **ip_address**         | isIp2Long    | ❌        | 15       |                    |
| **message**            | isCleanHtml  | ✔️       | 16777216 |                    |
| **file_name**          |              | ❌        |          |                    |
| **user_agent**         |              | ❌        |          |                    |
| **private**            | isBool       | ❌        |          |                    |
| **date_add**           | isDate       | ❌        |          |                    |
| **date_upd**           | isDate       | ❌        |          |                    |
| **read**               | isBool       | ❌        |          |                    |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <customer_message>
    <id><![CDATA[]]></id>
    <id_employee><![CDATA[]]></id_employee>
    <id_customer_thread><![CDATA[]]></id_customer_thread>
    <ip_address><![CDATA[]]></ip_address>
    <message><![CDATA[]]></message>
    <file_name><![CDATA[]]></file_name>
    <user_agent><![CDATA[]]></user_agent>
    <private><![CDATA[]]></private>
    <date_add><![CDATA[]]></date_add>
    <date_upd><![CDATA[]]></date_upd>
    <read><![CDATA[]]></read>
  </customer_message>
</prestashop>
```

