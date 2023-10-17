# PrestaShop Technical Documentation

[![Build](https://github.com/PrestaShop/docs/actions/workflows/build.yml/badge.svg)](https://github.com/PrestaShop/docs/actions/workflows/build.yml)
[![DevDocs Site update](https://github.com/PrestaShop/docs/actions/workflows/update-site.yml/badge.svg)](https://github.com/PrestaShop/docs/actions/workflows/update-site.yml)

This documentation is available at [https://devdocs.prestashop-project.org/](https://devdocs.prestashop-project.org/)

## Contributing

Contributions are more than welcome! [Find out how](https://devdocs.prestashop-project.org/8/contribute/documentation/how/).

> [!NOTE]
> This repository has specific contribution rules, please [read them](https://github.com/PrestaShop/docs/blob/8.x/.github/CONTRIBUTION_PROCESS.md).

## Rendering the site locally

See https://github.com/PrestaShop/devdocs-site/

## Deployment

The deployment pipeline is documented on the [sources repository for DevDocs](https://github.com/PrestaShop/devdocs-site).

## License

Content from this documentation is licensed under the [Creative Commons Attribution-ShareAlike 4.0 International License](https://creativecommons.org/licenses/by-sa/4.0/).

## Maintaining Hook list referential

A complete referential of hook and informations on each hook is located in `modules/concepts/hooks/list-of-hooks/`. 

This referential can be generated with a script, crawling all: 

- PrestaShop (core) codebase
- all native modules
- all native themes

In the documentation, a hook is described in yaml format: 

```yaml
---
Title: string #name of the hook
hidden: boolean[true] #must be true
hookTitle: string #title for the description
description: string #description sentence
origin: string #core, module or theme
files:
    -
        theme: string #theme name only if origin=theme
        module: string #module name only if origin=module
        url: string #url of the file on github
        file: string #path of the file
locations:
    - string #back office, front office or both
type: string #action or display
hookAliases:
    - string #old hook name or alias
array_return: boolean #true or false if the hook has an `$array_return` parameter set to `true`
check_exceptions: boolean #true or false if the hook has a `$check_exceptions` parameter set to `false`
chain: boolean #true or false if the hook has a `$chain` parameter set to `true` 
---
```

This YAML structure enables the shortcode `hookDescriptor` to generate an HTML page with condensed information for documentation, and allows the search script to search within this metadata.

Next, add the shortcode in the page's content: 

```
{{% hookDescriptor %}}
```

Finally, if available, add a section with a code example and parameters details: 

```
## Parameters details
[...]

## Call of the Hook in the origin file
[...]
```