---
title: Attachments
---

# Resources for Attachments

{{< minver v="1.7.8" title="true" >}}

### Attachment

|       Name       |    Format     | Required | Max size | Description |
| :--------------- | :------------ | :------: | -------: | :---------- |
| **file**         | isGenericName | ✔️       | 40       |             |
| **file_name**    | isGenericName | ❌        | 128      |             |
| **file_size**    | isUnsignedId  | ❌        |          |             |
| **mime**         | isCleanHtml   | ✔️       | 128      |             |
| **name**         | isGenericName | ✔️       | 32       |             |
| **description**  | isCleanHtml   | ❌        |          |             |
| **associations** |               | ❌        |          |             |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <attachment>
    <id><![CDATA[]]></id>
    <file><![CDATA[]]></file>
    <file_name><![CDATA[]]></file_name>
    <file_size><![CDATA[]]></file_size>
    <mime><![CDATA[]]></mime>
    <name>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </name>
    <description>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </description>
    <associations>
      <products>
        <product>
          <id><![CDATA[]]></id>
        </product>
      </products>
    </associations>
  </attachment>
</prestashop>
```

