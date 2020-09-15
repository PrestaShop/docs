---
title: Order cart rules
---

# Resources for Order cart rules

### Order_cart_rule

|         Name         |    Format    | Required |   Description    |
| :------------------- | :----------- | :------: | :--------------- |
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
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <order_cart_rule>
    <id><![CDATA[]]></id>
    <id_order><![CDATA[]]></id_order>
    <id_cart_rule><![CDATA[]]></id_cart_rule>
    <id_order_invoice><![CDATA[]]></id_order_invoice>
    <name><![CDATA[]]></name>
    <value><![CDATA[]]></value>
    <value_tax_excl><![CDATA[]]></value_tax_excl>
    <free_shipping><![CDATA[]]></free_shipping>
    <deleted><![CDATA[]]></deleted>
  </order_cart_rule>
</prestashop>
```

