---
title: States
---

# Resources for States

### State

|      Name      |     Format     | Required | Max size | Description |
| :------------- | :------------- | :------- | :------- | :---------- |
| **id_zone**    | isUnsignedId   | ✔️       |          | Zone ID     |
| **id_country** | isUnsignedId   | ✔️       |          | Country ID  |
| **iso_code**   | isStateIsoCode | ✔️       | 7        |             |
| **name**       | isGenericName  | ✔️       | 32       |             |
| **active**     | isBool         | ❌        |          |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <state>
    <id>
    </id>
    <id_zone>
    </id_zone>
    <id_country>
    </id_country>
    <iso_code>
    </iso_code>
    <name>
    </name>
    <active>
    </active>
  </state>
</prestashop>
```

