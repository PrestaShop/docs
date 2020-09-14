---
title: Manufacturers
---

# Resources for Manufacturers

### Manufacturer

|         Name          |    Format     | Required | Writable | Max size | Not filterable | Description |
| :-------------------- | :------------ | :------- | :------- | :------- | :------------- | :---------- |
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
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <manufacturer>
    <id>
    </id>
    <active>
    </active>
    <name>
    </name>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
    <description>
      <language id="1"/>
      <language id="2"/>
    </description>
    <short_description>
      <language id="1"/>
      <language id="2"/>
    </short_description>
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
      <addresses>
        <address>
          <id>
          </id>
        </address>
      </addresses>
    </associations>
  </manufacturer>
</prestashop>
```

