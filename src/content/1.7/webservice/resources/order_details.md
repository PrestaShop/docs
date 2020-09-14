---
title: Order details
---

# Resources for Order details

### Order_detail

|               Name                |    Format     | Required |     Description      |
| :-------------------------------- | :------------ | :------- | :------------------- |
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
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <order_detail>
    <id>
    </id>
    <id_order>
    </id_order>
    <product_id>
    </product_id>
    <product_attribute_id>
    </product_attribute_id>
    <product_quantity_reinjected>
    </product_quantity_reinjected>
    <group_reduction>
    </group_reduction>
    <discount_quantity_applied>
    </discount_quantity_applied>
    <download_hash>
    </download_hash>
    <download_deadline>
    </download_deadline>
    <id_order_invoice>
    </id_order_invoice>
    <id_warehouse>
    </id_warehouse>
    <id_shop>
    </id_shop>
    <id_customization>
    </id_customization>
    <product_name>
    </product_name>
    <product_quantity>
    </product_quantity>
    <product_quantity_in_stock>
    </product_quantity_in_stock>
    <product_quantity_return>
    </product_quantity_return>
    <product_quantity_refunded>
    </product_quantity_refunded>
    <product_price>
    </product_price>
    <reduction_percent>
    </reduction_percent>
    <reduction_amount>
    </reduction_amount>
    <reduction_amount_tax_incl>
    </reduction_amount_tax_incl>
    <reduction_amount_tax_excl>
    </reduction_amount_tax_excl>
    <product_quantity_discount>
    </product_quantity_discount>
    <product_ean13>
    </product_ean13>
    <product_isbn>
    </product_isbn>
    <product_upc>
    </product_upc>
    <product_mpn>
    </product_mpn>
    <product_reference>
    </product_reference>
    <product_supplier_reference>
    </product_supplier_reference>
    <product_weight>
    </product_weight>
    <tax_computation_method>
    </tax_computation_method>
    <id_tax_rules_group>
    </id_tax_rules_group>
    <ecotax>
    </ecotax>
    <ecotax_tax_rate>
    </ecotax_tax_rate>
    <download_nb>
    </download_nb>
    <unit_price_tax_incl>
    </unit_price_tax_incl>
    <unit_price_tax_excl>
    </unit_price_tax_excl>
    <total_price_tax_incl>
    </total_price_tax_incl>
    <total_price_tax_excl>
    </total_price_tax_excl>
    <total_shipping_price_tax_excl>
    </total_shipping_price_tax_excl>
    <total_shipping_price_tax_incl>
    </total_shipping_price_tax_incl>
    <purchase_supplier_price>
    </purchase_supplier_price>
    <original_product_price>
    </original_product_price>
    <original_wholesale_price>
    </original_wholesale_price>
    <total_refunded_tax_excl>
    </total_refunded_tax_excl>
    <total_refunded_tax_incl>
    </total_refunded_tax_incl>
    <associations>
      <taxes>
        <tax>
          <id>
          </id>
        </tax>
      </taxes>
    </associations>
  </order_detail>
</prestashop>
```

