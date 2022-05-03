---
title: Moving pages
weight: 40
---

# Moving pages

If you need to move a page from the documentation you need to think about the people who bookmarked it and about search engines. As much as possible, make sure URLs are preserved.

## Moving page outside of the documentation

You can use the following hugo configuration to create a redirection:

```
---
layout: redirect
redirect: https://www.newsite.org/new_location
_build:
  list: never
---
```

See [example PR](https://github.com/PrestaShop/docs/pull/1210)

## Moving pages inside the documentation

You can use [Hugo aliases](https://gohugo.io/content-management/urls/) to preserve URLs

```
---
title: ...
aliases:
  - /previous-url
---
```

See [example PR](https://github.com/PrestaShop/docs/pull/564)