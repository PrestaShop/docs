---
menuTitle: actionGetExtraMailTemplateVars
Title: actionGetExtraMailTemplateVars
hidden: true
hookTitle: 
files:
  - classes/Mail.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionGetExtraMailTemplateVars

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Mail.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Mail.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Call of the Hook in the origin file

```php
Hook::exec(
                'actionGetExtraMailTemplateVars',
                [
                    'template' => $template,
                    'template_vars' => $templateVars,
                    'extra_template_vars' => &$extraTemplateVars,
                    'id_lang' => (int) $idLang,
                ],
                null,
                true
            )
```