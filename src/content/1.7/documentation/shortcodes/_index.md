---
title: Shortcodes
---

# Shortcodes

Hugo provides some nice features that extend Markdown: **shortcodes**.

Some default shortcodes are provided by Hugo (You can read more about them on the [Shortcodes documentation](https://gohugo.io/content-management/shortcodes/).
), but some are custom-made for this theme, so read on.

## Quick reference

Here are the most useful shortcodes:

### Cross links

To link to another page in the documentation, use `ref`:

    [This is a link to Configuration]({{</* ref "1.7/basics/configuration.md" */>}})

Rendered code:

[This is a link to Configuration]({{< ref "1.7/basics/installation/configuration.md" >}})

{{% notice tip %}}
Don't forget to put the link between double quotes.
{{% /notice %}}

### Internal links

To a link that points to a specific point in the current page, use `relref`:

    [This is a link to Shortcodes]({{</* ref "#extended-features-shortcodes" */>}})
    
Rendered code:

[This is a link to Shortcodes]({{< ref "#extended-features-shortcodes" >}})

{{% notice info %}}
**Internal links need to be "slugified" to work.**<br>
If you feel lost, here's a [tool that will slugify your titles](https://you.tools/slugify/).
{{% /notice %}}

### Notes / tip block

You can add notice blocks to make some information stand out:

#### Note

```
{{%/* notice note */%}}
This is something you may want to know.
{{%/* /notice */%}}
```

Renders to:

{{% notice note %}}
This is something you may want to know.
{{% /notice %}}

#### Tip

```
{{%/* notice tip */%}}
Everything will be fine, trust me.
{{%/* /notice */%}}
```

Renders to:

{{% notice tip %}}
Everything will be fine, trust me.
{{% /notice %}}

#### Info

```
{{%/* notice info */%}}
This is pretty important, you should pay attention.
{{%/* /notice */%}}
```

Renders to:

{{% notice info %}}
This is pretty important, you should pay attention.
{{% /notice %}}

#### Warning

```
{{%/* notice warning */%}}
Watch out, danger zone!
{{%/* /notice */%}}
```

Renders to:

{{% notice warning %}}
Watch out, danger zone!
{{% /notice %}}
