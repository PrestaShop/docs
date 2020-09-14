---
title: Order invoices
---

# Resources for Order invoices

### Order_invoice

|                Name                 |    Format    | Required | Max size | Description |
| :---------------------------------- | :----------- | :------- | :------- | :---------- |
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
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <order_invoice>
    <id>
    </id>
    <id_order>
    </id_order>
    <number>
    </number>
    <delivery_number>
    </delivery_number>
    <delivery_date>
    </delivery_date>
    <total_discount_tax_excl>
    </total_discount_tax_excl>
    <total_discount_tax_incl>
    </total_discount_tax_incl>
    <total_paid_tax_excl>
    </total_paid_tax_excl>
    <total_paid_tax_incl>
    </total_paid_tax_incl>
    <total_products>
    </total_products>
    <total_products_wt>
    </total_products_wt>
    <total_shipping_tax_excl>
    </total_shipping_tax_excl>
    <total_shipping_tax_incl>
    </total_shipping_tax_incl>
    <shipping_tax_computation_method>
    </shipping_tax_computation_method>
    <total_wrapping_tax_excl>
    </total_wrapping_tax_excl>
    <total_wrapping_tax_incl>
    </total_wrapping_tax_incl>
    <shop_address>
    </shop_address>
    <note>
    </note>
    <date_add>
    </date_add>
  </order_invoice>
</prestashop>
```

