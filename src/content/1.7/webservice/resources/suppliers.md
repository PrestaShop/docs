---
title: Suppliers
---

# Resources for Suppliers

### Supplier

|         Name         |    Format     | Required | Max size | Description |
| :------------------- | :------------ | :------- | :------- | :---------- |
| **link_rewrite**     |               | ❌        |          |             |
| **name**             | isCatalogName | ✔️       | 64       |             |
| **active**           |               | ❌        |          |             |
| **date_add**         | isDate        | ❌        |          |             |
| **date_upd**         | isDate        | ❌        |          |             |
| **description**      | isCleanHtml   | ❌        |          |             |
| **meta_title**       | isGenericName | ❌        | 255      |             |
| **meta_description** | isGenericName | ❌        | 512      |             |
| **meta_keywords**    | isGenericName | ❌        | 255      |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <supplier>
    <id>
    </id>
    <link_rewrite>
    </link_rewrite>
    <name>
    </name>
    <active>
    </active>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
    <description>
      <language id="1"/>
      <language id="2"/>
    </description>
    <meta_title>
      <language id="1"/>
      <language id="2"/>
    </meta_title>
    <meta_description>
      <language id="1"/>
      <language id="2"/>
    </meta_description>
    <meta_keywords>
      <language id="1"/>
      <language id="2"/>
    </meta_keywords>
  </supplier>
</prestashop>
```

