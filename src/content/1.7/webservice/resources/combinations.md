---
title: Combinations
---

# Resources for Combinations

### Combination

|          Name           |     Format      | Required | Max size | Description |
| :---------------------- | :-------------- | :------: | -------: | :---------- |
| **id_product**          | isUnsignedId    | ✔️       |          | Product ID  |
| **location**            | isString        | ❌        | 255      |             |
| **ean13**               | isEan13         | ❌        | 13       |             |
| **isbn**                | isIsbn          | ❌        | 32       |             |
| **upc**                 | isUpc           | ❌        | 12       |             |
| **mpn**                 | isMpn           | ❌        | 40       |             |
| **quantity**            | isInt           | ❌        | 10       |             |
| **reference**           |                 | ❌        | 64       |             |
| **supplier_reference**  |                 | ❌        | 64       |             |
| **wholesale_price**     | isNegativePrice | ❌        | 27       |             |
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
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <combination>
    <id><![CDATA[]]></id>
    <id_product><![CDATA[]]></id_product>
    <location><![CDATA[]]></location>
    <ean13><![CDATA[]]></ean13>
    <isbn><![CDATA[]]></isbn>
    <upc><![CDATA[]]></upc>
    <mpn><![CDATA[]]></mpn>
    <quantity><![CDATA[]]></quantity>
    <reference><![CDATA[]]></reference>
    <supplier_reference><![CDATA[]]></supplier_reference>
    <wholesale_price><![CDATA[]]></wholesale_price>
    <price><![CDATA[]]></price>
    <ecotax><![CDATA[]]></ecotax>
    <weight><![CDATA[]]></weight>
    <unit_price_impact><![CDATA[]]></unit_price_impact>
    <minimal_quantity><![CDATA[]]></minimal_quantity>
    <low_stock_threshold><![CDATA[]]></low_stock_threshold>
    <low_stock_alert><![CDATA[]]></low_stock_alert>
    <default_on><![CDATA[]]></default_on>
    <available_date><![CDATA[]]></available_date>
    <associations>
      <product_option_values>
        <product_option_value>
          <id><![CDATA[]]></id>
        </product_option_value>
      </product_option_values>
      <images>
        <image>
          <id><![CDATA[]]></id>
        </image>
      </images>
    </associations>
  </combination>
</prestashop>
```

