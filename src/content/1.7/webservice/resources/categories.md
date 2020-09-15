---
title: Categories
---

# Resources for Categories

### Category

|           Name            |    Format     | Required | Writable | Max size | Not filterable |   Description   |
| :------------------------ | :------------ | :------: | :------: | -------: | :------------- | :-------------- |
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
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <category>
    <id><![CDATA[]]></id>
    <id_parent><![CDATA[]]></id_parent>
    <active><![CDATA[]]></active>
    <id_shop_default><![CDATA[]]></id_shop_default>
    <is_root_category><![CDATA[]]></is_root_category>
    <position><![CDATA[]]></position>
    <date_add><![CDATA[]]></date_add>
    <date_upd><![CDATA[]]></date_upd>
    <name>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </name>
    <link_rewrite>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </link_rewrite>
    <description>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </description>
    <meta_title>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </meta_title>
    <meta_description>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </meta_description>
    <meta_keywords>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </meta_keywords>
    <associations>
      <categories>
        <category>
          <id><![CDATA[]]></id>
        </category>
      </categories>
      <products>
        <product>
          <id><![CDATA[]]></id>
        </product>
      </products>
    </associations>
  </category>
</prestashop>
```

