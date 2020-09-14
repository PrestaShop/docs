---
title: Product features
---

# Resources for Product features

### Product_feature

|     Name     |    Format     | Required | Max size | Description |
| :----------- | :------------ | :------- | :------- | :---------- |
| **position** | isInt         | ❌        |          |             |
| **name**     | isGenericName | ✔️       | 128      |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <product_feature>
    <id>
    </id>
    <position>
    </position>
    <name>
      <language id="1"/>
      <language id="2"/>
    </name>
  </product_feature>
</prestashop>
```

