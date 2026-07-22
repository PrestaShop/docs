---
title: prestashop:thumbnails:regenerate
category: Assets & Media
description: Regenerate product and category image thumbnails
weight: 10
---

# `prestashop:thumbnails:regenerate`

{{< minver v="9.1" title="true" >}}

## Informations

* Path: `src/PrestaShopBundle/Command/RegenerateThumbnailsCommand.php`
* Arguments:
  * `image`: Image domain (e.g products, categories, manufacturers, ...)
  * `image-type`: Image format ID (0 for all) __(optional)__
* Options:
  * `--delete`: Erase previous images before regenerating __(optional)__

## Description

This command aims to regenerate thumbnails via command line.

## Examples

### Regenerate products image types

```bash
$ bin/console prestashop:thumbnails:regenerate products
```

### Regenerate categories image types for image type ID 5
```bash
$ bin/console prestashop:thumbnails:regenerate categories 5
```

### Regenerate all image types and erase previous thumbnails
```bash
$ bin/console prestashop:thumbnails:regenerate all --delete
```
