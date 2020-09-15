---
title: Order details
---

# Resources for Order details

### Order_detail

|               Name                |    Format     | Required |     Description      |
| :-------------------------------- | :------------ | :------: | :------------------- |
| **id_order**                      | isUnsignedId  | ✔️       | Order ID             |
| **product_id**                    | isUnsignedId  | ❌        | Product ID           |
| **product_attribute_id**          | isUnsignedId  | ❌        | Product attribute ID |
| **product_quantity_reinjected**   | isUnsignedInt | ❌        |                      |
| **group_reduction**               | isFloat       | ❌        |                      |
| **discount_quantity_applied**     | isInt         | ❌        |                      |
| **download_hash**                 | isGenericName | ❌        |                      |
| **download_deadline**             | isDateFormat  | ❌        |                      |
| **id_order_invoice**              | isUnsignedId  | ❌        | Order invoice ID     |
| **id_warehouse**                  | isUnsignedId  | ✔️       | Warehouse ID         |
| **id_shop**                       | isUnsignedId  | ✔️       | Shop ID              |
| **id_customization**              | isUnsignedId  | ❌        | Customization ID     |
| **product_name**                  | isGenericName | ✔️       |                      |
| **product_quantity**              | isInt         | ✔️       |                      |
| **product_quantity_in_stock**     | isInt         | ❌        |                      |
| **product_quantity_return**       | isUnsignedInt | ❌        |                      |
| **product_quantity_refunded**     | isUnsignedInt | ❌        |                      |
| **product_price**                 | isPrice       | ✔️       |                      |
| **reduction_percent**             | isFloat       | ❌        |                      |
| **reduction_amount**              | isPrice       | ❌        |                      |
| **reduction_amount_tax_incl**     | isPrice       | ❌        |                      |
| **reduction_amount_tax_excl**     | isPrice       | ❌        |                      |
| **product_quantity_discount**     | isFloat       | ❌        |                      |
| **product_ean13**                 | isEan13       | ❌        |                      |
| **product_isbn**                  | isIsbn        | ❌        |                      |
| **product_upc**                   | isUpc         | ❌        |                      |
| **product_mpn**                   | isMpn         | ❌        |                      |
| **product_reference**             | isReference   | ❌        |                      |
| **product_supplier_reference**    | isReference   | ❌        |                      |
| **product_weight**                | isFloat       | ❌        |                      |
| **tax_computation_method**        | isUnsignedId  | ❌        |                      |
| **id_tax_rules_group**            | isInt         | ❌        | Tax rules group ID   |
| **ecotax**                        | isFloat       | ❌        |                      |
| **ecotax_tax_rate**               | isFloat       | ❌        |                      |
| **download_nb**                   | isInt         | ❌        |                      |
| **unit_price_tax_incl**           | isPrice       | ❌        |                      |
| **unit_price_tax_excl**           | isPrice       | ❌        |                      |
| **total_price_tax_incl**          | isPrice       | ❌        |                      |
| **total_price_tax_excl**          | isPrice       | ❌        |                      |
| **total_shipping_price_tax_excl** | isPrice       | ❌        |                      |
| **total_shipping_price_tax_incl** | isPrice       | ❌        |                      |
| **purchase_supplier_price**       | isPrice       | ❌        |                      |
| **original_product_price**        | isPrice       | ❌        |                      |
| **original_wholesale_price**      | isPrice       | ❌        |                      |
| **total_refunded_tax_excl**       | isPrice       | ❌        |                      |
| **total_refunded_tax_incl**       | isPrice       | ❌        |                      |
| **associations**                  |               | ❌        |                      |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <order_detail>
    <id><![CDATA[]]></id>
    <id_order><![CDATA[]]></id_order>
    <product_id><![CDATA[]]></product_id>
    <product_attribute_id><![CDATA[]]></product_attribute_id>
    <product_quantity_reinjected><![CDATA[]]></product_quantity_reinjected>
    <group_reduction><![CDATA[]]></group_reduction>
    <discount_quantity_applied><![CDATA[]]></discount_quantity_applied>
    <download_hash><![CDATA[]]></download_hash>
    <download_deadline><![CDATA[]]></download_deadline>
    <id_order_invoice><![CDATA[]]></id_order_invoice>
    <id_warehouse><![CDATA[]]></id_warehouse>
    <id_shop><![CDATA[]]></id_shop>
    <id_customization><![CDATA[]]></id_customization>
    <product_name><![CDATA[]]></product_name>
    <product_quantity><![CDATA[]]></product_quantity>
    <product_quantity_in_stock><![CDATA[]]></product_quantity_in_stock>
    <product_quantity_return><![CDATA[]]></product_quantity_return>
    <product_quantity_refunded><![CDATA[]]></product_quantity_refunded>
    <product_price><![CDATA[]]></product_price>
    <reduction_percent><![CDATA[]]></reduction_percent>
    <reduction_amount><![CDATA[]]></reduction_amount>
    <reduction_amount_tax_incl><![CDATA[]]></reduction_amount_tax_incl>
    <reduction_amount_tax_excl><![CDATA[]]></reduction_amount_tax_excl>
    <product_quantity_discount><![CDATA[]]></product_quantity_discount>
    <product_ean13><![CDATA[]]></product_ean13>
    <product_isbn><![CDATA[]]></product_isbn>
    <product_upc><![CDATA[]]></product_upc>
    <product_mpn><![CDATA[]]></product_mpn>
    <product_reference><![CDATA[]]></product_reference>
    <product_supplier_reference><![CDATA[]]></product_supplier_reference>
    <product_weight><![CDATA[]]></product_weight>
    <tax_computation_method><![CDATA[]]></tax_computation_method>
    <id_tax_rules_group><![CDATA[]]></id_tax_rules_group>
    <ecotax><![CDATA[]]></ecotax>
    <ecotax_tax_rate><![CDATA[]]></ecotax_tax_rate>
    <download_nb><![CDATA[]]></download_nb>
    <unit_price_tax_incl><![CDATA[]]></unit_price_tax_incl>
    <unit_price_tax_excl><![CDATA[]]></unit_price_tax_excl>
    <total_price_tax_incl><![CDATA[]]></total_price_tax_incl>
    <total_price_tax_excl><![CDATA[]]></total_price_tax_excl>
    <total_shipping_price_tax_excl><![CDATA[]]></total_shipping_price_tax_excl>
    <total_shipping_price_tax_incl><![CDATA[]]></total_shipping_price_tax_incl>
    <purchase_supplier_price><![CDATA[]]></purchase_supplier_price>
    <original_product_price><![CDATA[]]></original_product_price>
    <original_wholesale_price><![CDATA[]]></original_wholesale_price>
    <total_refunded_tax_excl><![CDATA[]]></total_refunded_tax_excl>
    <total_refunded_tax_incl><![CDATA[]]></total_refunded_tax_incl>
    <associations>
      <taxes>
        <tax>
          <id><![CDATA[]]></id>
        </tax>
      </taxes>
    </associations>
  </order_detail>
</prestashop>
```

