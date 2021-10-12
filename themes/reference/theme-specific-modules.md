---
title: Theme-specific modules
---

# Theme-specific modules

When you write a theme, you may need to extend PrestaShop features. You can do that by adding modules that will be tied to your theme and shipped with it.

## Adding a module

Theme-specific modules should be placed in your theme's `dependencies/modules` directory:

```
.
└── dependencies
│   └── modules
│       └── mymodule
...
```


## Declaring the module

You can declare the module in your theme's [theme.yml file]({{< relref "/1.7/themes/getting-started/theme-organization" >}}):

```yaml
dependencies:
  modules:
    - mymodule

global_settings:
  modules:
    to_enable:
      - mymodule
```

This will make PrestaShop:
- copy the module to the `/modules` folder when installing the theme
- install the module the first time the theme is enabled
- enable/disable the module along with your theme
