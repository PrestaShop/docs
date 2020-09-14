---
title: Order slip
---

# Resources for Order slip

### Order_slip

|            Name             |    Format    | Required | Description |
| :-------------------------- | :----------- | :------- | :---------- |
| **id_customer**             | isUnsignedId | ✔️       | Customer ID |
| **id_order**                | isUnsignedId | ✔️       | Order ID    |
| **conversion_rate**         | isFloat      | ✔️       |             |
| **total_products_tax_excl** | isFloat      | ✔️       |             |
| **total_products_tax_incl** | isFloat      | ✔️       |             |
| **total_shipping_tax_excl** | isFloat      | ✔️       |             |
| **total_shipping_tax_incl** | isFloat      | ✔️       |             |
| **amount**                  | isFloat      | ❌        |             |
| **shipping_cost**           |              | ❌        |             |
| **shipping_cost_amount**    | isFloat      | ❌        |             |
| **partial**                 |              | ❌        |             |
| **date_add**                | isDate       | ❌        |             |
| **date_upd**                | isDate       | ❌        |             |
| **order_slip_type**         | isInt        | ❌        |             |
| **associations**            |              | ❌        |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <order_slip>
    <id>
    </id>
    <id_customer>
    </id_customer>
    <id_order>
    </id_order>
    <conversion_rate>
    </conversion_rate>
    <total_products_tax_excl>
    </total_products_tax_excl>
    <total_products_tax_incl>
    </total_products_tax_incl>
    <total_shipping_tax_excl>
    </total_shipping_tax_excl>
    <total_shipping_tax_incl>
    </total_shipping_tax_incl>
    <amount>
    </amount>
    <shipping_cost>
    </shipping_cost>
    <shipping_cost_amount>
    </shipping_cost_amount>
    <partial>
    </partial>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
    <order_slip_type>
    </order_slip_type>
    <associations>
      <order_slip_details>
        <order_slip_detail>
          <id>
          </id>
          <id_order_detail>
          </id_order_detail>
          <product_quantity>
          </product_quantity>
          <amount_tax_excl>
          </amount_tax_excl>
          <amount_tax_incl>
          </amount_tax_incl>
        </order_slip_detail>
      </order_slip_details>
    </associations>
  </order_slip>
</prestashop>
```

