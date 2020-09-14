---
title: Carts
---

# Resources for Carts

### Cart

|            Name             |    Format    | Required | Max size |     Description     |
| :-------------------------- | :----------- | :------- | :------- | :------------------ |
| **id_address_delivery**     | isUnsignedId | ❌        |          | Delivery address ID |
| **id_address_invoice**      | isUnsignedId | ❌        |          | Invoice address ID  |
| **id_currency**             | isUnsignedId | ✔️       |          | Currency ID         |
| **id_customer**             | isUnsignedId | ❌        |          | Customer ID         |
| **id_guest**                | isUnsignedId | ❌        |          | Guest ID            |
| **id_lang**                 | isUnsignedId | ✔️       |          | Lang ID             |
| **id_shop_group**           | isUnsignedId | ❌        |          | Shop group ID       |
| **id_shop**                 | isUnsignedId | ❌        |          | Shop ID             |
| **id_carrier**              | isUnsignedId | ❌        |          | Carrier ID          |
| **recyclable**              | isBool       | ❌        |          |                     |
| **gift**                    | isBool       | ❌        |          |                     |
| **gift_message**            | isMessage    | ❌        |          |                     |
| **mobile_theme**            | isBool       | ❌        |          |                     |
| **delivery_option**         |              | ❌        |          |                     |
| **secure_key**              |              | ❌        | 32       |                     |
| **allow_seperated_package** | isBool       | ❌        |          |                     |
| **date_add**                | isDate       | ❌        |          |                     |
| **date_upd**                | isDate       | ❌        |          |                     |
| **associations**            |              | ❌        |          |                     |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <cart>
    <id>
    </id>
    <id_address_delivery>
    </id_address_delivery>
    <id_address_invoice>
    </id_address_invoice>
    <id_currency>
    </id_currency>
    <id_customer>
    </id_customer>
    <id_guest>
    </id_guest>
    <id_lang>
    </id_lang>
    <id_shop_group>
    </id_shop_group>
    <id_shop>
    </id_shop>
    <id_carrier>
    </id_carrier>
    <recyclable>
    </recyclable>
    <gift>
    </gift>
    <gift_message>
    </gift_message>
    <mobile_theme>
    </mobile_theme>
    <delivery_option>
    </delivery_option>
    <secure_key>
    </secure_key>
    <allow_seperated_package>
    </allow_seperated_package>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
    <associations>
      <cart_rows>
        <cart_row>
          <id_product>
          </id_product>
          <id_product_attribute>
          </id_product_attribute>
          <id_address_delivery>
          </id_address_delivery>
          <id_customization>
          </id_customization>
          <quantity>
          </quantity>
        </cart_row>
      </cart_rows>
    </associations>
  </cart>
</prestashop>
```

