---
menuTitle: actionEmailAddBeforeContent
Title: actionEmailAddBeforeContent
hidden: true
hookTitle: Add extra content before mail content
files:
  - classes/Mail.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionEmailAddBeforeContent

## Information

{{% notice tip %}}
**Add extra content before mail content:** 

This hook is called just before fetching mail template
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Mail.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Mail.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Call of the Hook in the origin file

```php
Hook::exec(
                'actionEmailAddBeforeContent',
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