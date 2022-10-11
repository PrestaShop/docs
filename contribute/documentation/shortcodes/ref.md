---
title: Internal and cross links
weight: 1
---

# Internal and cross links

## Cross links

To link to another page in the documentation, use `ref`:

    [This is a link to Configuration]({{</* ref "/8/development/configuration" */>}})


Rendered result:

{{% callout %}}
[This is a link to Configuration]({{< ref "/8/development/configuration" >}})
{{% /callout %}}

{{% notice tip %}}
Don't forget to put the link between double quotes.
{{% /notice %}}

## Internal links

To a link that points to a specific point in the current page, use `relref`:

    [This is a link to the first title]({{</* relref "#cross-links" */>}})
    
Rendered result:

{{% callout %}}
[This is a link to the first title]({{< relref "#cross-links" >}})
{{% /callout %}}

{{% notice info %}}
**Internal links need to be "slugified" to work.**

If you feel lost, here's a [tool that will slugify your titles](https://you.tools/slugify/).
{{% /notice %}}
