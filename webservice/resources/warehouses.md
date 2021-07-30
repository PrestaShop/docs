---
title: Warehouses
---

# Resources for Warehouses

### Warehouse

|        Name         |      Format       | Required | Writable | Max size | Not filterable | Description |
| :------------------ | :---------------- | :------: | :------: | -------: | :------------- | :---------- |
| **id_address**      | isUnsignedId      | ✔️       | ✔️       |          |                |             |
| **id_employee**     | isUnsignedId      | ✔️       | ✔️       |          |                | Employee ID |
| **id_currency**     | isUnsignedId      | ✔️       | ✔️       |          |                | Currency ID |
| **valuation**       |                   | ❌        | ❌        |          | true           |             |
| **deleted**         |                   | ❌        | ✔️       |          |                |             |
| **reference**       | isString          | ✔️       | ✔️       | 64       |                |             |
| **name**            | isString          | ✔️       | ✔️       | 45       |                |             |
| **management_type** | isStockManagement | ✔️       | ✔️       |          |                |             |
| **associations**    |                   | ❌        | ✔️       |          |                |             |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <warehouse>
    <id><![CDATA[]]></id>
    <id_address><![CDATA[]]></id_address>
    <id_employee><![CDATA[]]></id_employee>
    <id_currency><![CDATA[]]></id_currency>
    <deleted><![CDATA[]]></deleted>
    <reference><![CDATA[]]></reference>
    <name><![CDATA[]]></name>
    <management_type><![CDATA[]]></management_type>
    <associations>
      <stocks>
        <stock>
          <id><![CDATA[]]></id>
        </stock>
      </stocks>
      <carriers>
        <carrier>
          <id><![CDATA[]]></id>
        </carrier>
      </carriers>
      <shops>
        <shop>
          <id><![CDATA[]]></id>
          <name><![CDATA[]]></name>
        </shop>
      </shops>
    </associations>
  </warehouse>
</prestashop>
```

