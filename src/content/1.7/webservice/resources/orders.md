---
title: Orders
---

# Resources for Orders

### Order

|             Name             |      Format      | Required | Not filterable |     Description     |
| :--------------------------- | :--------------- | :------- | :------------- | :------------------ |
| **id_address_delivery**      | isUnsignedId     | ✔️       |                | Delivery address ID |
| **id_address_invoice**       | isUnsignedId     | ✔️       |                | Invoice address ID  |
| **id_cart**                  | isUnsignedId     | ✔️       |                | Cart ID             |
| **id_currency**              | isUnsignedId     | ✔️       |                | Currency ID         |
| **id_lang**                  | isUnsignedId     | ✔️       |                | Lang ID             |
| **id_customer**              | isUnsignedId     | ✔️       |                | Customer ID         |
| **id_carrier**               | isUnsignedId     | ✔️       |                | Carrier ID          |
| **current_state**            | isUnsignedId     | ❌        |                |                     |
| **module**                   | isModuleName     | ✔️       |                |                     |
| **invoice_number**           |                  | ❌        |                |                     |
| **invoice_date**             |                  | ❌        |                |                     |
| **delivery_number**          |                  | ❌        |                |                     |
| **delivery_date**            |                  | ❌        |                |                     |
| **valid**                    |                  | ❌        |                |                     |
| **date_add**                 | isDate           | ❌        |                |                     |
| **date_upd**                 | isDate           | ❌        |                |                     |
| **shipping_number**          | isTrackingNumber | ❌        | true           |                     |
| **id_shop_group**            | isUnsignedId     | ❌        |                | Shop group ID       |
| **id_shop**                  | isUnsignedId     | ❌        |                | Shop ID             |
| **secure_key**               | isMd5            | ❌        |                |                     |
| **payment**                  | isGenericName    | ✔️       |                |                     |
| **recyclable**               | isBool           | ❌        |                |                     |
| **gift**                     | isBool           | ❌        |                |                     |
| **gift_message**             | isMessage        | ❌        |                |                     |
| **mobile_theme**             | isBool           | ❌        |                |                     |
| **total_discounts**          | isPrice          | ❌        |                |                     |
| **total_discounts_tax_incl** | isPrice          | ❌        |                |                     |
| **total_discounts_tax_excl** | isPrice          | ❌        |                |                     |
| **total_paid**               | isPrice          | ✔️       |                |                     |
| **total_paid_tax_incl**      | isPrice          | ❌        |                |                     |
| **total_paid_tax_excl**      | isPrice          | ❌        |                |                     |
| **total_paid_real**          | isPrice          | ✔️       |                |                     |
| **total_products**           | isPrice          | ✔️       |                |                     |
| **total_products_wt**        | isPrice          | ✔️       |                |                     |
| **total_shipping**           | isPrice          | ❌        |                |                     |
| **total_shipping_tax_incl**  | isPrice          | ❌        |                |                     |
| **total_shipping_tax_excl**  | isPrice          | ❌        |                |                     |
| **carrier_tax_rate**         | isFloat          | ❌        |                |                     |
| **total_wrapping**           | isPrice          | ❌        |                |                     |
| **total_wrapping_tax_incl**  | isPrice          | ❌        |                |                     |
| **total_wrapping_tax_excl**  | isPrice          | ❌        |                |                     |
| **round_mode**               | isUnsignedId     | ❌        |                |                     |
| **round_type**               | isUnsignedId     | ❌        |                |                     |
| **conversion_rate**          | isFloat          | ✔️       |                |                     |
| **reference**                |                  | ❌        |                |                     |
| **associations**             |                  | ❌        |                |                     |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <order>
    <id>
    </id>
    <id_address_delivery>
    </id_address_delivery>
    <id_address_invoice>
    </id_address_invoice>
    <id_cart>
    </id_cart>
    <id_currency>
    </id_currency>
    <id_lang>
    </id_lang>
    <id_customer>
    </id_customer>
    <id_carrier>
    </id_carrier>
    <current_state>
    </current_state>
    <module>
    </module>
    <invoice_number>
    </invoice_number>
    <invoice_date>
    </invoice_date>
    <delivery_number>
    </delivery_number>
    <delivery_date>
    </delivery_date>
    <valid>
    </valid>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
    <shipping_number>
    </shipping_number>
    <id_shop_group>
    </id_shop_group>
    <id_shop>
    </id_shop>
    <secure_key>
    </secure_key>
    <payment>
    </payment>
    <recyclable>
    </recyclable>
    <gift>
    </gift>
    <gift_message>
    </gift_message>
    <mobile_theme>
    </mobile_theme>
    <total_discounts>
    </total_discounts>
    <total_discounts_tax_incl>
    </total_discounts_tax_incl>
    <total_discounts_tax_excl>
    </total_discounts_tax_excl>
    <total_paid>
    </total_paid>
    <total_paid_tax_incl>
    </total_paid_tax_incl>
    <total_paid_tax_excl>
    </total_paid_tax_excl>
    <total_paid_real>
    </total_paid_real>
    <total_products>
    </total_products>
    <total_products_wt>
    </total_products_wt>
    <total_shipping>
    </total_shipping>
    <total_shipping_tax_incl>
    </total_shipping_tax_incl>
    <total_shipping_tax_excl>
    </total_shipping_tax_excl>
    <carrier_tax_rate>
    </carrier_tax_rate>
    <total_wrapping>
    </total_wrapping>
    <total_wrapping_tax_incl>
    </total_wrapping_tax_incl>
    <total_wrapping_tax_excl>
    </total_wrapping_tax_excl>
    <round_mode>
    </round_mode>
    <round_type>
    </round_type>
    <conversion_rate>
    </conversion_rate>
    <reference>
    </reference>
    <associations>
      <order_rows>
        <order_row>
          <id>
          </id>
          <product_id>
          </product_id>
          <product_attribute_id>
          </product_attribute_id>
          <product_quantity>
          </product_quantity>
          <product_name>
          </product_name>
          <product_reference>
          </product_reference>
          <product_ean13>
          </product_ean13>
          <product_isbn>
          </product_isbn>
          <product_upc>
          </product_upc>
          <product_price>
          </product_price>
          <id_customization>
          </id_customization>
          <unit_price_tax_incl>
          </unit_price_tax_incl>
          <unit_price_tax_excl>
          </unit_price_tax_excl>
        </order_row>
      </order_rows>
    </associations>
  </order>
</prestashop>
```

