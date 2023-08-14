---
menuTitle: displayRightColumn
Title: displayRightColumn
hidden: true
hookTitle: New elements on a page (right column)
files:
  - Classic Theme: templates/layouts/layout-both-columns.tpl
locations:
  - front office
type: display
hookAliases:
 - extraRight
---

# Hook displayRightColumn

Aliases: 
 - extraRight

## Information

{{% notice tip %}}
**New elements on a page (right column):** 

This hook displays new elements in the right-hand column of a page
{{% /notice %}}

{{% notice note %}}
When located on a product page, the hook is [`displayRightColumnProduct`]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayRightColumnProduct">}})
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [Classic Theme: templates/layouts/layout-both-columns.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-both-columns.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayRightColumn'}
```