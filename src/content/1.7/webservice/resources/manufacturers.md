---
title: Manufacturers
---

# Resources for Manufacturers

### Manufacturer

|         Name          |    Format     | Required | Writable | Max size | Not filterable | Description |
| :-------------------- | :------------ | :------: | :------: | -------: | :------------- | :---------- |
| **active**            |               | ❌        | ✔️       |          |                |             |
| **link_rewrite**      |               | ❌        | ❌        |          | true           |             |
| **name**              | isCatalogName | ✔️       | ✔️       | 64       |                |             |
| **date_add**          |               | ❌        | ✔️       |          |                |             |
| **date_upd**          |               | ❌        | ✔️       |          |                |             |
| **description**       | isCleanHtml   | ❌        | ✔️       |          |                |             |
| **short_description** | isCleanHtml   | ❌        | ✔️       |          |                |             |
| **meta_title**        | isGenericName | ❌        | ✔️       | 255      |                |             |
| **meta_description**  | isGenericName | ❌        | ✔️       | 512      |                |             |
| **meta_keywords**     | isGenericName | ❌        | ✔️       |          |                |             |
| **associations**      |               | ❌        | ✔️       |          |                |             |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <manufacturer>
    <id><![CDATA[]]></id>
    <active><![CDATA[]]></active>
    <name><![CDATA[]]></name>
    <date_add><![CDATA[]]></date_add>
    <date_upd><![CDATA[]]></date_upd>
    <description>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </description>
    <short_description>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </short_description>
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
      <addresses>
        <address>
          <id><![CDATA[]]></id>
        </address>
      </addresses>
    </associations>
  </manufacturer>
</prestashop>
```

