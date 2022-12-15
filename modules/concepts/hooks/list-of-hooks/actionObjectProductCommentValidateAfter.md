---
menuTitle: actionObjectProductCommentValidateAfter
Title: actionObjectProductCommentValidateAfter
hidden: true
hookTitle: 
files:
  - modules/productcomments/ProductComment.php
locations:
  - back office
  - front office
type: action
hookAliases:
---

# Hook actionObjectProductCommentValidateAfter

## Information

Hook locations: 
  - back office
  - front office

Hook type: action

Located in: 
  - [modules/productcomments/ProductComment.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/productcomments/ProductComment.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionObjectProductCommentValidateAfter', ['object' => $this])
```