---
menuTitle: actionEmailAddAfterContent
Title: actionEmailAddAfterContent
hidden: true
hookTitle: Add extra content after mail content
files:
  - classes/Mail.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionEmailAddAfterContent

## Information

{{% notice tip %}}
**Add extra content after mail content:** 

This hook is called just after fetching mail template
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Mail.php](classes/Mail.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Hook call in codebase

```php
Hook::exec(
                'actionEmailAddAfterContent',
                [
                    'template' => $template,
                    'template_html' => &$templateHtml,
                    'template_txt' => &$templateTxt,
                    'id_lang' => (int) $idLang,
                ],
                null,
                true
            )
```