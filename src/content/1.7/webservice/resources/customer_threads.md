---
title: Customer threads
---

# Resources for Customer threads

### Customer_thread

|       Name       |    Format     | Required | Max size | Description |
| :--------------- | :------------ | :------- | :------- | :---------- |
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
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <customer_thread>
    <id>
    </id>
    <id_lang>
    </id_lang>
    <id_shop>
    </id_shop>
    <id_customer>
    </id_customer>
    <id_order>
    </id_order>
    <id_product>
    </id_product>
    <id_contact>
    </id_contact>
    <email>
    </email>
    <token>
    </token>
    <status>
    </status>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
    <associations>
      <customer_messages>
        <customer_message>
          <id>
          </id>
        </customer_message>
      </customer_messages>
    </associations>
  </customer_thread>
</prestashop>
```

