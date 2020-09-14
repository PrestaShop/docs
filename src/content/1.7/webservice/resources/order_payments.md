---
title: Order payments
---

# Resources for Order payments

### Order_payment

|        Name         |    Format     | Required | Max size | Description |
| :------------------ | :------------ | :------- | :------- | :---------- |
| **order_reference** | isAnything    | ❌        | 9        |             |
| **id_currency**     | isUnsignedId  | ✔️       |          | Currency ID |
| **amount**          | isPrice       | ✔️       |          |             |
| **payment_method**  | isGenericName | ❌        |          |             |
| **conversion_rate** | isFloat       | ❌        |          |             |
| **transaction_id**  | isAnything    | ❌        | 254      |             |
| **card_number**     | isAnything    | ❌        | 254      |             |
| **card_brand**      | isAnything    | ❌        | 254      |             |
| **card_expiration** | isAnything    | ❌        | 254      |             |
| **card_holder**     | isAnything    | ❌        | 254      |             |
| **date_add**        | isDate        | ❌        |          |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <order_payment>
    <id>
    </id>
    <order_reference>
    </order_reference>
    <id_currency>
    </id_currency>
    <amount>
    </amount>
    <payment_method>
    </payment_method>
    <conversion_rate>
    </conversion_rate>
    <transaction_id>
    </transaction_id>
    <card_number>
    </card_number>
    <card_brand>
    </card_brand>
    <card_expiration>
    </card_expiration>
    <card_holder>
    </card_holder>
    <date_add>
    </date_add>
  </order_payment>
</prestashop>
```

