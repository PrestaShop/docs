---
title: Cart rules
---

# Resources for Cart rules

### Cart_rule

|             Name              |    Format     | Required | Max size | Description |
| :---------------------------- | :------------ | :------- | :------- | :---------- |
| **id_customer**               | isUnsignedId  | ❌        |          | Customer ID |
| **date_from**                 | isDate        | ✔️       |          |             |
| **date_to**                   | isDate        | ✔️       |          |             |
| **description**               | isCleanHtml   | ❌        | 65534    |             |
| **quantity**                  | isUnsignedInt | ❌        |          |             |
| **quantity_per_user**         | isUnsignedInt | ❌        |          |             |
| **priority**                  | isUnsignedInt | ❌        |          |             |
| **partial_use**               | isBool        | ❌        |          |             |
| **code**                      | isCleanHtml   | ❌        | 254      |             |
| **minimum_amount**            | isFloat       | ❌        |          |             |
| **minimum_amount_tax**        | isBool        | ❌        |          |             |
| **minimum_amount_currency**   | isInt         | ❌        |          |             |
| **minimum_amount_shipping**   | isBool        | ❌        |          |             |
| **country_restriction**       | isBool        | ❌        |          |             |
| **carrier_restriction**       | isBool        | ❌        |          |             |
| **group_restriction**         | isBool        | ❌        |          |             |
| **cart_rule_restriction**     | isBool        | ❌        |          |             |
| **product_restriction**       | isBool        | ❌        |          |             |
| **shop_restriction**          | isBool        | ❌        |          |             |
| **free_shipping**             | isBool        | ❌        |          |             |
| **reduction_percent**         | isPercentage  | ❌        |          |             |
| **reduction_amount**          | isFloat       | ❌        |          |             |
| **reduction_tax**             | isBool        | ❌        |          |             |
| **reduction_currency**        | isUnsignedId  | ❌        |          |             |
| **reduction_product**         | isInt         | ❌        |          |             |
| **reduction_exclude_special** | isBool        | ❌        |          |             |
| **gift_product**              | isUnsignedId  | ❌        |          |             |
| **gift_product_attribute**    | isUnsignedId  | ❌        |          |             |
| **highlight**                 | isBool        | ❌        |          |             |
| **active**                    | isBool        | ❌        |          |             |
| **date_add**                  | isDate        | ❌        |          |             |
| **date_upd**                  | isDate        | ❌        |          |             |
| **name**                      | isCleanHtml   | ✔️       | 254      |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <cart_rule>
    <id>
    </id>
    <id_customer>
    </id_customer>
    <date_from>
    </date_from>
    <date_to>
    </date_to>
    <description>
    </description>
    <quantity>
    </quantity>
    <quantity_per_user>
    </quantity_per_user>
    <priority>
    </priority>
    <partial_use>
    </partial_use>
    <code>
    </code>
    <minimum_amount>
    </minimum_amount>
    <minimum_amount_tax>
    </minimum_amount_tax>
    <minimum_amount_currency>
    </minimum_amount_currency>
    <minimum_amount_shipping>
    </minimum_amount_shipping>
    <country_restriction>
    </country_restriction>
    <carrier_restriction>
    </carrier_restriction>
    <group_restriction>
    </group_restriction>
    <cart_rule_restriction>
    </cart_rule_restriction>
    <product_restriction>
    </product_restriction>
    <shop_restriction>
    </shop_restriction>
    <free_shipping>
    </free_shipping>
    <reduction_percent>
    </reduction_percent>
    <reduction_amount>
    </reduction_amount>
    <reduction_tax>
    </reduction_tax>
    <reduction_currency>
    </reduction_currency>
    <reduction_product>
    </reduction_product>
    <reduction_exclude_special>
    </reduction_exclude_special>
    <gift_product>
    </gift_product>
    <gift_product_attribute>
    </gift_product_attribute>
    <highlight>
    </highlight>
    <active>
    </active>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
    <name>
      <language id="1"/>
      <language id="2"/>
    </name>
  </cart_rule>
</prestashop>
```

