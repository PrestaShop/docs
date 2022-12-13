---
menuTitle: actionGetMailLayoutTransformations
Title: actionGetMailLayoutTransformations
hidden: true
hookTitle: Define the transformation to apply on layout
files:
  - src/Adapter/MailTemplate/MailTemplateTwigRenderer.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionGetMailLayoutTransformations

## Information

{{% notice tip %}}
**Define the transformation to apply on layout:** 

This hook allows to add/remove TransformationInterface used to generate an email layout
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/MailTemplate/MailTemplateTwigRenderer.php](src/Adapter/MailTemplate/MailTemplateTwigRenderer.php)

## Call of the Hook in the origin file

```php
dispatchWithParameters(
            MailTemplateRendererInterface::GET_MAIL_LAYOUT_TRANSFORMATIONS,
            [
                'mailLayout' => $mailLayout,
                'templateType' => $templateType,
                'layoutTransformations' => $templateTransformations,
            ]
        )
```