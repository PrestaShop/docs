---
title: Order invoices
---

# Resources for Order invoices

### Order_invoice

|                Name                 |    Format    | Required | Max size | Description |
| :---------------------------------- | :----------- | :------: | -------: | :---------- |
| **id_order**                        | isUnsignedId | ✔️       |          | Order ID    |
| **number**                          | isUnsignedId | ✔️       |          |             |
| **delivery_number**                 | isUnsignedId | ❌        |          |             |
| **delivery_date**                   | isDateFormat | ❌        |          |             |
| **total_discount_tax_excl**         |              | ❌        |          |             |
| **total_discount_tax_incl**         |              | ❌        |          |             |
| **total_paid_tax_excl**             |              | ❌        |          |             |
| **total_paid_tax_incl**             |              | ❌        |          |             |
| **total_products**                  |              | ❌        |          |             |
| **total_products_wt**               |              | ❌        |          |             |
| **total_shipping_tax_excl**         |              | ❌        |          |             |
| **total_shipping_tax_incl**         |              | ❌        |          |             |
| **shipping_tax_computation_method** |              | ❌        |          |             |
| **total_wrapping_tax_excl**         |              | ❌        |          |             |
| **total_wrapping_tax_incl**         |              | ❌        |          |             |
| **shop_address**                    | isCleanHtml  | ❌        | 1000     |             |
| **note**                            | isCleanHtml  | ❌        | 65000    |             |
| **date_add**                        | isDate       | ❌        |          |             |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <order_invoice>
    <id><![CDATA[]]></id>
    <id_order><![CDATA[]]></id_order>
    <number><![CDATA[]]></number>
    <delivery_number><![CDATA[]]></delivery_number>
    <delivery_date><![CDATA[]]></delivery_date>
    <total_discount_tax_excl><![CDATA[]]></total_discount_tax_excl>
    <total_discount_tax_incl><![CDATA[]]></total_discount_tax_incl>
    <total_paid_tax_excl><![CDATA[]]></total_paid_tax_excl>
    <total_paid_tax_incl><![CDATA[]]></total_paid_tax_incl>
    <total_products><![CDATA[]]></total_products>
    <total_products_wt><![CDATA[]]></total_products_wt>
    <total_shipping_tax_excl><![CDATA[]]></total_shipping_tax_excl>
    <total_shipping_tax_incl><![CDATA[]]></total_shipping_tax_incl>
    <shipping_tax_computation_method><![CDATA[]]></shipping_tax_computation_method>
    <total_wrapping_tax_excl><![CDATA[]]></total_wrapping_tax_excl>
    <total_wrapping_tax_incl><![CDATA[]]></total_wrapping_tax_incl>
    <shop_address><![CDATA[]]></shop_address>
    <note><![CDATA[]]></note>
    <date_add><![CDATA[]]></date_add>
  </order_invoice>
</prestashop>
```

