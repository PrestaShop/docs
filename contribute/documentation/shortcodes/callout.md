---
title: Callout
aliases:
    - /1.7/documentation/shortcodes/callout/
---

# Callout

This shortcode allows you to display a block inside your document to make some information stand out.

{{% notice note %}}
As with all shortcodes, keep in mind that headers inside won't appear in the article's table of contents.
{{% /notice %}}

```markdown
{{%/* callout */%}}
#### This is a callout

This is a very important block of text. Also, notice how the title doesn't appear in the table of contents.
{{%/* /callout */%}} 
```

Rendered result:

{{% callout %}}
#### This is a callout

This is a very important block of text. Also, notice how the title doesn't appear in the table of contents.
{{% /callout %}} 
