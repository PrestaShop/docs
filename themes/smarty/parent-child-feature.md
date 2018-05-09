Parent/child theme
==================

PrestaShop 1.7 relies a lot on
template inheritance &lt;/template-inheritance&gt; in order to create
the most consistant theme possible while heavily reducing the amount of
duplicated code.

We took it even further introducing the Parent Child theme feature. The
point to is to avoid modifying the main theme so you can update it!

> **note**
>
> This feature is only useful if you want to slightly modify a theme (to
> add a block for example). If you need to modify the markup more
> deeply, modify the theme, don't create a child theme.

> **warning**
>
> Do not use StarterTheme as a parent theme EVER. StarterTheme is meant
> to be modified.

The principle
-------------

So far we talked about extending template within the same theme. In
PrestaShop 1.7 you can now extend templates from another theme.

> **tip**
>
> As a theme developer, you want to create as many block as possible so
> your user can override the minimum amount of code.

How to create a child theme
---------------------------

First you need to have the theme you want to use as parent in your store
`/themes` folder.

Then you can create a very minimal theme, containing only the following
files:

``` {.sourceCode .bash}
.
├── config
│   └── theme.yml
└── preview.png
```

> **tip**
>
> It's recommended to copy these files from the Parent theme.

Once you have this, you will specify in your child theme `theme.yml`
which theme should be used as a parent. The value must be the theme
technical name (ie: the theme folder name).

``` {.sourceCode .yaml}
parent: classic
name: childtheme
display_name: My first child Theme
version: 1.0.0
assets:
  use_parent_assets: true
```

Go ahead, select this theme in your backoffice and you're all set.

Overriding templates
--------------------

Without any further modification the child theme will use every template
from the parent theme.

In the following example we'll modify the category template.

### Re-defining the whole template

Create the category template in your child theme
`templates/catalog/listing/category.tpl`. At this point can do anything
you want in this template but most likely you still want to extend
product-list template. If so, you don't have to copy product-list
template to your child theme, PrestaShop will use the parent file.

Extend product-list the normal way and override the block you need.

``` {.sourceCode .smarty}
{extends file='catalog/listing/product-list.tpl'}
```

### Extending the same template

Another way to overriding the category template would be to extend the
parent template and define just the block you need. There is a little
difference if you want to override the same template, you need to add
the parent resource (note the parent keyword in the example below).

``` {.sourceCode .smarty}
{extends file='parent:catalog/listing/category.tpl'}
```
