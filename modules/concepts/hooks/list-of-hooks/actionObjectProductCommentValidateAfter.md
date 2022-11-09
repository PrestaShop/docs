---
menuTitle: actionObjectProductCommentValidateAfter
Title: actionObjectProductCommentValidateAfter
hidden: true
hookTitle: 
files:
  - modules/productcomments/ProductComment.php
locations:
  - backoffice
  - frontoffice
types:
  - legacy
---

# Hook : actionObjectProductCommentValidateAfter

## Informations

Hook locations: 
  - backoffice
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - modules/productcomments/ProductComment.php

## Hook call with parameters

```php
Hook::exec('actionObjectProductCommentValidateAfter', ['object' => $this]);
```