---
title: Parent/child theme
---

# Parent/child theme

PrestaShop relies a lot on template inheritance in order to create the most consistent theme possible, while heavily reducing the amount of duplicated code.

We took it even further introducing the Parent Child theme feature. The point to is to avoid modifying the main theme, so you can update it!

{{% notice note %}}
  This feature is only useful if you want to slightly modify a theme (to add a block for example).
  If you need to modify the markup more deeply, modify the theme, don't create a child theme.
{{% /notice %}}

## The principle

So far we talked about extending template within the same theme. But you can also extend templates from another theme.

{{% notice tip %}}
  As a theme developer, you want to create as many blocks as possible so your user can
  override the minimum amount of code.
{{% /notice %}}

## How to create a child theme

First you need to have the theme you want to use as parent in your store `/themes` folder.

Then you can create a very minimal theme, containing only the following files:

```bash
  .
  ├── config
  │   └── theme.yml
  └── preview.png
```

{{% notice tip %}}
  It's recommended to copy these files from the Parent theme.
{{% /notice %}}

Once you have this, you will specify in your child theme `theme.yml` which theme should be used as a parent.
The value must be the theme technical name (ie: the theme folder name).

```yaml
parent: classic
name: childtheme
display_name: My first child Theme
version: 1.0.0
assets:
  use_parent_assets: true
```

Go ahead, select this theme in your backoffice and you're all set.

### Overriding templates

Without any further modification the child theme will use every template from the parent theme.

In the following example we'll modify the category template.

### Re-defining the whole template

Create the category template in your child theme `templates/catalog/listing/category.tpl`. At this point you
can do anything you want in this template but most likely you still want to extend product-list template. If so,
you don't have to copy product-list template to your child theme, PrestaShop will use the parent file.

Extend product-list the normal way and override the block you need.

```smarty
  {extends file='catalog/listing/product-list.tpl'}
```

### Extending the same template

Another way to overriding the category template would be to extend the parent template and define just the
block you need. There is a little difference if you want to override the same template, you need to add
the parent resource (note the parent keyword in the example below).

```smarty
  {extends file='parent:catalog/listing/category.tpl'}
```
