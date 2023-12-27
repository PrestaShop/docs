---
Title: displayFooterBefore
hidden: true
hookTitle: displayFooterBefore
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/_partials/footer.tpl
      file: themes/classic/templates/_partials/footer.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird-theme/blob/develop/templates/_partials/footer.tpl
      file: themes/hummingbird/templates/_partials/footer.tpl

locations:
    - front office
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayFooterBefore'}
```

## Example implementation

This hook has been implemented as an example in our [modules examples repository - demomultistoreform](https://github.com/PrestaShop/example-modules/tree/master/demomultistoreform).
