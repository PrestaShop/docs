---
title: Orders
---

# Resources for Orders

### Order

|             Name             |      Format      | Required | Not filterable |     Description     |
| :--------------------------- | :--------------- | :------: | :------------- | :------------------ |
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
| **note**                     | isCleanHtml      | ❌        |                |                     |
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
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <order>
    <id><![CDATA[]]></id>
    <id_address_delivery><![CDATA[]]></id_address_delivery>
    <id_address_invoice><![CDATA[]]></id_address_invoice>
    <id_cart><![CDATA[]]></id_cart>
    <id_currency><![CDATA[]]></id_currency>
    <id_lang><![CDATA[]]></id_lang>
    <id_customer><![CDATA[]]></id_customer>
    <id_carrier><![CDATA[]]></id_carrier>
    <current_state><![CDATA[]]></current_state>
    <module><![CDATA[]]></module>
    <invoice_number><![CDATA[]]></invoice_number>
    <invoice_date><![CDATA[]]></invoice_date>
    <delivery_number><![CDATA[]]></delivery_number>
    <delivery_date><![CDATA[]]></delivery_date>
    <valid><![CDATA[]]></valid>
    <date_add><![CDATA[]]></date_add>
    <date_upd><![CDATA[]]></date_upd>
    <shipping_number><![CDATA[]]></shipping_number>
    <note><![CDATA[]]></note>
    <id_shop_group><![CDATA[]]></id_shop_group>
    <id_shop><![CDATA[]]></id_shop>
    <secure_key><![CDATA[]]></secure_key>
    <payment><![CDATA[]]></payment>
    <recyclable><![CDATA[]]></recyclable>
    <gift><![CDATA[]]></gift>
    <gift_message><![CDATA[]]></gift_message>
    <mobile_theme><![CDATA[]]></mobile_theme>
    <total_discounts><![CDATA[]]></total_discounts>
    <total_discounts_tax_incl><![CDATA[]]></total_discounts_tax_incl>
    <total_discounts_tax_excl><![CDATA[]]></total_discounts_tax_excl>
    <total_paid><![CDATA[]]></total_paid>
    <total_paid_tax_incl><![CDATA[]]></total_paid_tax_incl>
    <total_paid_tax_excl><![CDATA[]]></total_paid_tax_excl>
    <total_paid_real><![CDATA[]]></total_paid_real>
    <total_products><![CDATA[]]></total_products>
    <total_products_wt><![CDATA[]]></total_products_wt>
    <total_shipping><![CDATA[]]></total_shipping>
    <total_shipping_tax_incl><![CDATA[]]></total_shipping_tax_incl>
    <total_shipping_tax_excl><![CDATA[]]></total_shipping_tax_excl>
    <carrier_tax_rate><![CDATA[]]></carrier_tax_rate>
    <total_wrapping><![CDATA[]]></total_wrapping>
    <total_wrapping_tax_incl><![CDATA[]]></total_wrapping_tax_incl>
    <total_wrapping_tax_excl><![CDATA[]]></total_wrapping_tax_excl>
    <round_mode><![CDATA[]]></round_mode>
    <round_type><![CDATA[]]></round_type>
    <conversion_rate><![CDATA[]]></conversion_rate>
    <reference><![CDATA[]]></reference>
    <associations>
      <order_rows>
        <order_row>
          <id><![CDATA[]]></id>
          <product_id><![CDATA[]]></product_id>
          <product_attribute_id><![CDATA[]]></product_attribute_id>
          <product_quantity><![CDATA[]]></product_quantity>
          <product_name><![CDATA[]]></product_name>
          <product_reference><![CDATA[]]></product_reference>
          <product_ean13><![CDATA[]]></product_ean13>
          <product_isbn><![CDATA[]]></product_isbn>
          <product_upc><![CDATA[]]></product_upc>
          <product_price><![CDATA[]]></product_price>
          <id_customization><![CDATA[]]></id_customization>
          <unit_price_tax_incl><![CDATA[]]></unit_price_tax_incl>
          <unit_price_tax_excl><![CDATA[]]></unit_price_tax_excl>
        </order_row>
      </order_rows>
    </associations>
  </order>
</prestashop>
```

