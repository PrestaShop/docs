---
title: Order cart rules
---

# Resources for Order cart rules

### Order_cart_rule

|         Name         |    Format    | Required |   Description    |
| :------------------- | :----------- | :------- | :--------------- |
| **id_order**         | isUnsignedId | ✔️       | Order ID         |
| **id_cart_rule**     | isUnsignedId | ✔️       |                  |
| **id_order_invoice** | isUnsignedId | ❌        | Order invoice ID |
| **name**             | isCleanHtml  | ✔️       |                  |
| **value**            | isFloat      | ✔️       |                  |
| **value_tax_excl**   | isFloat      | ✔️       |                  |
| **free_shipping**    | isBool       | ❌        |                  |
| **deleted**          | isBool       | ❌        |                  |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <order_cart_rule>
    <id>
    </id>
    <id_order>
    </id_order>
    <id_cart_rule>
    </id_cart_rule>
    <id_order_invoice>
    </id_order_invoice>
    <name>
    </name>
    <value>
    </value>
    <value_tax_excl>
    </value_tax_excl>
    <free_shipping>
    </free_shipping>
    <deleted>
    </deleted>
  </order_cart_rule>
</prestashop>
```

