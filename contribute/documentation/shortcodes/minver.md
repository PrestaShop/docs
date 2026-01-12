---
title: Version pill
---

# Version pill

When highlighting a new feature, you may want to highlight the version on which that feature was added. You can add a version pill using `minver`:

```markdown
Everything's better on {{</* minver v="1.7.4" */>}}
```

Which renders to:

{{% callout %}}
Everything's better on {{< minver v="1.7.4" >}}
{{% /callout %}}

To align a pill with a title, use the parameter `title="true"`:

```markdown
#### Example title
{{</* minver v="1.7.4" title="true"*/>}}
```

Important, if using with title, please make sure the shortcode is on a new line after the title, with the `title="true"` parameter.

Which is rendered like this:

{{% callout %}}
#### Example title
{{< minver v="1.7.4" title="true" >}}
{{% /callout %}}
