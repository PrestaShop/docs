---
menuTitle: actionEmailSendBefore
Title: actionEmailSendBefore
hidden: true
hookTitle: Before sending an email
files:
  - classes/Mail.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionEmailSendBefore

## Information

{{% notice tip %}}
**Before sending an email:** 

This hook is used to filter the content or the metadata of an email before sending it or even prevent its sending
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Mail.php](classes/Mail.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/modules/concepts/hooks">}})).

## Hook call in codebase

```php
Hook::exec(
            'actionEmailSendBefore',
            [
                'idLang' => &$idLang,
                'template' => &$template,
                'subject' => &$subject,
                'templateVars' => &$templateVars,
                'to' => &$to,
                'toName' => &$toName,
                'from' => &$from,
                'fromName' => &$fromName,
                'fileAttachment' => &$fileAttachment,
                'mode_smtp' => &$mode_smtp,
                'templatePath' => &$templatePath,
                'die' => &$die,
                'idShop' => &$idShop,
                'bcc' => &$bcc,
                'replyTo' => &$replyTo,
            ],
            null,
            true
        )
```