---
title: Function definition
aliases:
    - /1.7/documentation/shortcodes/funcdef/
---

# Function definition

To render a list of function definitions, use `funcdef` in combination with Markdown definition list:

```markdown
{{%/* funcdef */%}}

__construct($id = NULL, $id_lang = NULL)
: 
    Build object.

add($autodate = true, $nullValues = false)
: 
    Save current object to database (add or update).

{{%/* /funcdef */%}}
```

Rendered result:

{{% callout %}}
{{% funcdef %}}

__construct($id = NULL, $id_lang = NULL)
: 
    Build object.

add($autodate = true, $nullValues = false)
: 
    Save current object to database (add or update).

{{% /funcdef %}}
{{% /callout %}}

{{% notice info %}}
Be aware that you need to leave at least one trailing space after each `:` for the markup to be correctly interpreted as a definition list. 
{{% /notice %}}
