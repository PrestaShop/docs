---
title: Version pill
---

# Version pill

When highlighting a new feature, you may want to highlight the version on which that feature was added. You can add a version pill using `minver`:

```go
Everything's better on {{</* minver v="1.7.4" */>}}
``` 

Which renders to:
 
Everything's better on {{< minver v="1.7.4" >}}

To align a pill with a title, use the parameter `title="true"`:

```go
##### Example title
{{</* minver v="1.7.4" title="true"*/>}}
``` 

Which is rendered like this:

##### Example title
{{< minver v="1.7.4" title="true" >}}
