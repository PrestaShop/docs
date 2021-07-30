---
title: Cart rules
---

# Resources for Cart rules

### Cart_rule

|             Name              |    Format     | Required | Max size | Description |
| :---------------------------- | :------------ | :------: | -------: | :---------- |
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
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <cart_rule>
    <id><![CDATA[]]></id>
    <id_customer><![CDATA[]]></id_customer>
    <date_from><![CDATA[]]></date_from>
    <date_to><![CDATA[]]></date_to>
    <description><![CDATA[]]></description>
    <quantity><![CDATA[]]></quantity>
    <quantity_per_user><![CDATA[]]></quantity_per_user>
    <priority><![CDATA[]]></priority>
    <partial_use><![CDATA[]]></partial_use>
    <code><![CDATA[]]></code>
    <minimum_amount><![CDATA[]]></minimum_amount>
    <minimum_amount_tax><![CDATA[]]></minimum_amount_tax>
    <minimum_amount_currency><![CDATA[]]></minimum_amount_currency>
    <minimum_amount_shipping><![CDATA[]]></minimum_amount_shipping>
    <country_restriction><![CDATA[]]></country_restriction>
    <carrier_restriction><![CDATA[]]></carrier_restriction>
    <group_restriction><![CDATA[]]></group_restriction>
    <cart_rule_restriction><![CDATA[]]></cart_rule_restriction>
    <product_restriction><![CDATA[]]></product_restriction>
    <shop_restriction><![CDATA[]]></shop_restriction>
    <free_shipping><![CDATA[]]></free_shipping>
    <reduction_percent><![CDATA[]]></reduction_percent>
    <reduction_amount><![CDATA[]]></reduction_amount>
    <reduction_tax><![CDATA[]]></reduction_tax>
    <reduction_currency><![CDATA[]]></reduction_currency>
    <reduction_product><![CDATA[]]></reduction_product>
    <reduction_exclude_special><![CDATA[]]></reduction_exclude_special>
    <gift_product><![CDATA[]]></gift_product>
    <gift_product_attribute><![CDATA[]]></gift_product_attribute>
    <highlight><![CDATA[]]></highlight>
    <active><![CDATA[]]></active>
    <date_add><![CDATA[]]></date_add>
    <date_upd><![CDATA[]]></date_upd>
    <name>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </name>
  </cart_rule>
</prestashop>
```

