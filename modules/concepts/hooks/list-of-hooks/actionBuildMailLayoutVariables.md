---
menuTitle: actionBuildMailLayoutVariables
Title: actionBuildMailLayoutVariables
hidden: true
hookTitle: Build the variables used in email layout rendering
files:
  - src/Core/MailTemplate/Layout/LayoutVariablesBuilder.php
locations:
  - front office
type: action
hookAliases:
hasExample: true
---

# Hook actionBuildMailLayoutVariables

## Information

{{% notice tip %}}
**Build the variables used in email layout rendering:** 

This hook allows to change the variables used when an email layout is rendered
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [src/Core/MailTemplate/Layout/LayoutVariablesBuilder.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/MailTemplate/Layout/LayoutVariablesBuilder.php)

## Call of the Hook in the origin file

```php
dispatchWithParameters(
            LayoutVariablesBuilderInterface::BUILD_MAIL_LAYOUT_VARIABLES_HOOK,
            [
                'mailLayout' => $mailLayout,
                'mailLayoutVariables' => &$mailLayoutVariables,
            ]
        )
```

## Example implementation

This hook has been implemented as an example in our [modules examples repository - example_module_mailtheme](https://github.com/PrestaShop/example-modules/blob/master/example_module_mailtheme).