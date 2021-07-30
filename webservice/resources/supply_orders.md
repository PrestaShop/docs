---
title: Supply orders
---

# Resources for Supply orders

### Supply_order

|            Name            |    Format     | Required | Description  |
| :------------------------- | :------------ | :------: | :----------- |
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
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <supply_order>
    <id><![CDATA[]]></id>
    <id_supplier><![CDATA[]]></id_supplier>
    <id_lang><![CDATA[]]></id_lang>
    <id_warehouse><![CDATA[]]></id_warehouse>
    <id_supply_order_state><![CDATA[]]></id_supply_order_state>
    <id_currency><![CDATA[]]></id_currency>
    <supplier_name><![CDATA[]]></supplier_name>
    <reference><![CDATA[]]></reference>
    <date_delivery_expected><![CDATA[]]></date_delivery_expected>
    <total_te><![CDATA[]]></total_te>
    <total_with_discount_te><![CDATA[]]></total_with_discount_te>
    <total_ti><![CDATA[]]></total_ti>
    <total_tax><![CDATA[]]></total_tax>
    <discount_rate><![CDATA[]]></discount_rate>
    <discount_value_te><![CDATA[]]></discount_value_te>
    <is_template><![CDATA[]]></is_template>
    <date_add><![CDATA[]]></date_add>
    <date_upd><![CDATA[]]></date_upd>
    <associations>
      <supply_order_details>
        <supply_order_detail>
          <id><![CDATA[]]></id>
          <id_product><![CDATA[]]></id_product>
          <id_product_attribute><![CDATA[]]></id_product_attribute>
          <supplier_reference><![CDATA[]]></supplier_reference>
          <product_name><![CDATA[]]></product_name>
        </supply_order_detail>
      </supply_order_details>
    </associations>
  </supply_order>
</prestashop>
```

