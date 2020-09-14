---
title: Supply orders
---

# Resources for Supply orders

### Supply_order

|            Name            |    Format     | Required | Description  |
| :------------------------- | :------------ | :------- | :----------- |
| **id_supplier**            | isUnsignedId  | ✔️       | Supplier ID  |
| **id_lang**                | isUnsignedId  | ✔️       | Lang ID      |
| **id_warehouse**           | isUnsignedId  | ✔️       | Warehouse ID |
| **id_supply_order_state**  | isUnsignedId  | ✔️       |              |
| **id_currency**            | isUnsignedId  | ✔️       | Currency ID  |
| **supplier_name**          | isCatalogName | ❌        |              |
| **reference**              | isGenericName | ✔️       |              |
| **date_delivery_expected** | isDate        | ✔️       |              |
| **total_te**               | isPrice       | ❌        |              |
| **total_with_discount_te** | isPrice       | ❌        |              |
| **total_ti**               | isPrice       | ❌        |              |
| **total_tax**              | isPrice       | ❌        |              |
| **discount_rate**          | isFloat       | ❌        |              |
| **discount_value_te**      | isPrice       | ❌        |              |
| **is_template**            | isBool        | ❌        |              |
| **date_add**               | isDate        | ❌        |              |
| **date_upd**               | isDate        | ❌        |              |
| **associations**           |               | ❌        |              |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <supply_order>
    <id>
    </id>
    <id_supplier>
    </id_supplier>
    <id_lang>
    </id_lang>
    <id_warehouse>
    </id_warehouse>
    <id_supply_order_state>
    </id_supply_order_state>
    <id_currency>
    </id_currency>
    <supplier_name>
    </supplier_name>
    <reference>
    </reference>
    <date_delivery_expected>
    </date_delivery_expected>
    <total_te>
    </total_te>
    <total_with_discount_te>
    </total_with_discount_te>
    <total_ti>
    </total_ti>
    <total_tax>
    </total_tax>
    <discount_rate>
    </discount_rate>
    <discount_value_te>
    </discount_value_te>
    <is_template>
    </is_template>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
    <associations>
      <supply_order_details>
        <supply_order_detail>
          <id>
          </id>
          <id_product>
          </id_product>
          <id_product_attribute>
          </id_product_attribute>
          <supplier_reference>
          </supplier_reference>
          <product_name>
          </product_name>
        </supply_order_detail>
      </supply_order_details>
    </associations>
  </supply_order>
</prestashop>
```

