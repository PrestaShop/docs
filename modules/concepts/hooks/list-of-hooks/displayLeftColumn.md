---
menuTitle: displayLeftColumn
Title: displayLeftColumn
hidden: true
hookTitle: New elements on a page (left column)
files:
  - themes/classic/templates/layouts/layout-both-columns.tpl
locations:
  - front office
type: display
hookAliases:
 - extraLeft
---

# Hook displayLeftColumn

Aliases: 
 - extraLeft

## Information

{{% notice tip %}}
**New elements on a page (left column):** 

This hook displays new elements in the left-hand column of a page
{{% /notice %}}

{{% notice note %}}
When located on a Product Page, the hook is [`displayLeftColumnProduct`]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayLeftColumnProduct">}})
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [themes/classic/templates/layouts/layout-both-columns.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/layouts/layout-both-columns.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayLeftColumn'}
```