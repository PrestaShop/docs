---
title: Warehouses
---

# Resources for Warehouses

### Warehouse

|        Name         |      Format       | Required | Writable | Max size | Not filterable | Description |
| :------------------ | :---------------- | :------- | :------- | :------- | :------------- | :---------- |
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
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <warehouse>
    <id>
    </id>
    <id_address>
    </id_address>
    <id_employee>
    </id_employee>
    <id_currency>
    </id_currency>
    <deleted>
    </deleted>
    <reference>
    </reference>
    <name>
    </name>
    <management_type>
    </management_type>
    <associations>
      <stocks>
        <stock>
          <id>
          </id>
        </stock>
      </stocks>
      <carriers>
        <carrier>
          <id>
          </id>
        </carrier>
      </carriers>
      <shops>
        <shop>
          <id>
          </id>
          <name>
          </name>
        </shop>
      </shops>
    </associations>
  </warehouse>
</prestashop>
```

