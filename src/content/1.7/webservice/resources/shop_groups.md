---
title: Shop groups
---

# Resources for Shop groups

### Shop_group

|        Name        |    Format     | Required | Max size | Description |
| :----------------- | :------------ | :------- | :------- | :---------- |
| **name**           | isGenericName | ✔️       | 64       |             |
| **share_customer** | isBool        | ❌        |          |             |
| **share_order**    | isBool        | ❌        |          |             |
| **share_stock**    | isBool        | ❌        |          |             |
| **active**         | isBool        | ❌        |          |             |
| **deleted**        | isBool        | ❌        |          |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <shop_group>
    <id>
    </id>
    <name>
    </name>
    <share_customer>
    </share_customer>
    <share_order>
    </share_order>
    <share_stock>
    </share_stock>
    <active>
    </active>
    <deleted>
    </deleted>
  </shop_group>
</prestashop>
```

