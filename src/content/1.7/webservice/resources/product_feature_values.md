---
title: Product feature values
---

# Resources for Product feature values

### Product_feature_value

|      Name      |    Format     | Required | Max size | Description |
| :------------- | :------------ | :------- | :------- | :---------- |
| **id_feature** | isUnsignedId  | ✔️       |          |             |
| **custom**     | isBool        | ❌        |          |             |
| **value**      | isGenericName | ✔️       | 255      |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <product_feature_value>
    <id>
    </id>
    <id_feature>
    </id_feature>
    <custom>
    </custom>
    <value>
      <language id="1"/>
      <language id="2"/>
    </value>
  </product_feature_value>
</prestashop>
```

