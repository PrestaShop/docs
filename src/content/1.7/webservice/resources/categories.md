---
title: Categories
---

# Resources for Categories

### Category

|           Name            |    Format     | Required | Writable | Max size | Not filterable |   Description   |
| :------------------------ | :------------ | :------- | :------- | :------- | :------------- | :-------------- |
| **id_parent**             | isUnsignedInt | ❌        | ✔️       |          |                | Parent ID       |
| **level_depth**           | isUnsignedInt | ❌        | ❌        |          |                |                 |
| **nb_products_recursive** |               | ❌        | ❌        |          | true           |                 |
| **active**                | isBool        | ✔️       | ✔️       |          |                |                 |
| **id_shop_default**       | isUnsignedId  | ❌        | ✔️       |          |                | Default shop ID |
| **is_root_category**      | isBool        | ❌        | ✔️       |          |                |                 |
| **position**              |               | ❌        | ✔️       |          |                |                 |
| **date_add**              | isDate        | ❌        | ✔️       |          |                |                 |
| **date_upd**              | isDate        | ❌        | ✔️       |          |                |                 |
| **name**                  | isCatalogName | ✔️       | ✔️       | 128      |                |                 |
| **link_rewrite**          | isLinkRewrite | ✔️       | ✔️       | 128      |                |                 |
| **description**           | isCleanHtml   | ❌        | ✔️       |          |                |                 |
| **meta_title**            | isGenericName | ❌        | ✔️       | 255      |                |                 |
| **meta_description**      | isGenericName | ❌        | ✔️       | 512      |                |                 |
| **meta_keywords**         | isGenericName | ❌        | ✔️       | 255      |                |                 |
| **associations**          |               | ❌        | ✔️       |          |                |                 |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <category>
    <id>
    </id>
    <id_parent>
    </id_parent>
    <active>
    </active>
    <id_shop_default>
    </id_shop_default>
    <is_root_category>
    </is_root_category>
    <position>
    </position>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
    <name>
      <language id="1"/>
      <language id="2"/>
    </name>
    <link_rewrite>
      <language id="1"/>
      <language id="2"/>
    </link_rewrite>
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
    <associations>
      <categories>
        <category>
          <id>
          </id>
        </category>
      </categories>
      <products>
        <product>
          <id>
          </id>
        </product>
      </products>
    </associations>
  </category>
</prestashop>
```

