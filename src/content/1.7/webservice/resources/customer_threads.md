---
title: Customer threads
---

# Resources for Customer threads

### Customer_thread

|       Name       |    Format     | Required | Max size | Description |
| :--------------- | :------------ | :------: | -------: | :---------- |
| **id_lang**      | isUnsignedId  | ✔️       |          | Lang ID     |
| **id_shop**      | isUnsignedId  | ❌        |          | Shop ID     |
| **id_customer**  | isUnsignedId  | ❌        |          | Customer ID |
| **id_order**     | isUnsignedId  | ❌        |          | Order ID    |
| **id_product**   | isUnsignedId  | ❌        |          | Product ID  |
| **id_contact**   | isUnsignedId  | ✔️       |          | Contact ID  |
| **email**        | isEmail       | ❌        | 255      |             |
| **token**        | isGenericName | ✔️       |          |             |
| **status**       |               | ❌        |          |             |
| **date_add**     | isDate        | ❌        |          |             |
| **date_upd**     | isDate        | ❌        |          |             |
| **associations** |               | ❌        |          |             |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <customer_thread>
    <id><![CDATA[]]></id>
    <id_lang><![CDATA[]]></id_lang>
    <id_shop><![CDATA[]]></id_shop>
    <id_customer><![CDATA[]]></id_customer>
    <id_order><![CDATA[]]></id_order>
    <id_product><![CDATA[]]></id_product>
    <id_contact><![CDATA[]]></id_contact>
    <email><![CDATA[]]></email>
    <token><![CDATA[]]></token>
    <status><![CDATA[]]></status>
    <date_add><![CDATA[]]></date_add>
    <date_upd><![CDATA[]]></date_upd>
    <associations>
      <customer_messages>
        <customer_message>
          <id><![CDATA[]]></id>
        </customer_message>
      </customer_messages>
    </associations>
  </customer_thread>
</prestashop>
```

