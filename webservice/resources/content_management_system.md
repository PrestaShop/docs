---
title: Content management system
---

# Resources for Content management system

### Content

|         Name         |    Format     | Required |   Max size    |   Description   |
| :------------------- | :------------ | :------: | ------------: | :-------------- |
| **id_cms_category**  | isUnsignedInt | ❌        |               | CMS Category ID |
| **position**         |               | ❌        |               |                 |
| **indexation**       |               | ❌        |               |                 |
| **active**           |               | ❌        |               |                 |
| **meta_description** | isGenericName | ❌        | 512           |                 |
| **meta_keywords**    | isGenericName | ❌        | 255           |                 |
| **meta_title**       | isGenericName | ✔️       | 255           |                 |
| **head_seo_title**   | isGenericName | ❌        | 255           |                 |
| **link_rewrite**     | isLinkRewrite | ✔️       | 128           |                 |
| **content**          | isCleanHtml   | ❌        | 3999999999999 |                 |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <content>
    <id><![CDATA[]]></id>
    <id_cms_category><![CDATA[]]></id_cms_category>
    <position><![CDATA[]]></position>
    <indexation><![CDATA[]]></indexation>
    <active><![CDATA[]]></active>
    <meta_description>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </meta_description>
    <meta_keywords>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </meta_keywords>
    <meta_title>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </meta_title>
    <head_seo_title>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </head_seo_title>
    <link_rewrite>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </link_rewrite>
    <content>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </content>
  </content>
</prestashop>
```

