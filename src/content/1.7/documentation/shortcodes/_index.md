---
title: Shortcodes
---

# Shortcodes

Hugo provides a nice feature that extends Markdown: **shortcodes**.

## How they work

Shortcodes are a special tags that you can use when writing your content that are interpreted by Hugo before the Markdown parser. You can think of them as "template macros".

There are two kinds of shortcodes:

1. **Tag style** (surrounds your content)  
    ```go
    {{%/* ExampleShortcode */%}} My custom content goes here {{%/* /ExampleShortcode */%}}
    ``` 
    
2. **Placeholder style** (self-closing, adds some content)  
   ```go
   {{%/* ExampleShortcode */%}}
   ```

##### Markdown expansion vs raw HTML

You can choose to delimit your shortcodes with either `{{%/* */%}}` or `{{</* */>}}`.

If you use the `{{%/* */%}}` notation, the content you include between the opening and the closing tag will be processed using Markdown. Otherwise, it will be treated as raw HTML.

##### Parameters

Some shortcodes also accept parameters. Use them like this:

```go
{{%/* ExampleShortcode param1="value1" params2="value2" */%}}
```

## Quick reference

Some default shortcodes are provided by Hugo (read [shortcodes documentation](https://gohugo.io/content-management/shortcodes/)) and some have been custom-made for this theme.

Here are the most useful shortcodes, both native and custom:

- [funcdef][3] – Displays a styled function definition list.
- [minver][4] – Displays a version pill.
- [notice][2] – Displays a "note", "tip" or "warning" box to highlight important information.
- [ref][1] – Links to another DevDocs page or a section of the page.

[1]: {{< ref "1.7/documentation/shortcodes/ref.md" >}}
[2]: {{< ref "1.7/documentation/shortcodes/notice.md" >}}
[3]: {{< ref "1.7/documentation/shortcodes/funcdef.md" >}}
[4]: {{< ref "1.7/documentation/shortcodes/minver.md" >}}
