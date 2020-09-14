---
title: Combinations
---

# Resources for Combinations

### Combination

|          Name           |     Format      | Required | Max size | Description |
| :---------------------- | :-------------- | :------- | :------- | :---------- |
| **id_product**          | isUnsignedId    | ✔️       |          | Product ID  |
| **location**            | isGenericName   | ❌        | 64       |             |
| **ean13**               | isEan13         | ❌        | 13       |             |
| **isbn**                | isIsbn          | ❌        | 32       |             |
| **upc**                 | isUpc           | ❌        | 12       |             |
| **mpn**                 | isMpn           | ❌        | 40       |             |
| **quantity**            | isInt           | ❌        | 10       |             |
| **reference**           |                 | ❌        | 64       |             |
| **supplier_reference**  |                 | ❌        | 64       |             |
| **wholesale_price**     | isPrice         | ❌        | 27       |             |
| **price**               | isNegativePrice | ❌        | 20       |             |
| **ecotax**              | isPrice         | ❌        | 20       |             |
| **weight**              | isFloat         | ❌        |          |             |
| **unit_price_impact**   | isNegativePrice | ❌        | 20       |             |
| **minimal_quantity**    | isUnsignedId    | ✔️       |          |             |
| **low_stock_threshold** | isInt           | ❌        |          |             |
| **low_stock_alert**     | isBool          | ❌        |          |             |
| **default_on**          | isBool          | ❌        |          |             |
| **available_date**      | isDateFormat    | ❌        |          |             |
| **associations**        |                 | ❌        |          |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <combination>
    <id>
    </id>
    <id_product>
    </id_product>
    <location>
    </location>
    <ean13>
    </ean13>
    <isbn>
    </isbn>
    <upc>
    </upc>
    <mpn>
    </mpn>
    <quantity>
    </quantity>
    <reference>
    </reference>
    <supplier_reference>
    </supplier_reference>
    <wholesale_price>
    </wholesale_price>
    <price>
    </price>
    <ecotax>
    </ecotax>
    <weight>
    </weight>
    <unit_price_impact>
    </unit_price_impact>
    <minimal_quantity>
    </minimal_quantity>
    <low_stock_threshold>
    </low_stock_threshold>
    <low_stock_alert>
    </low_stock_alert>
    <default_on>
    </default_on>
    <available_date>
    </available_date>
    <associations>
      <product_option_values>
        <product_option_value>
          <id>
          </id>
        </product_option_value>
      </product_option_values>
      <images>
        <image>
          <id>
          </id>
        </image>
      </images>
    </associations>
  </combination>
</prestashop>
```

