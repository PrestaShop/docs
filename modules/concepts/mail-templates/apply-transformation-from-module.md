---
title: How to apply a transformation from a module
menuTitle: Applying transformations
weight: 50
---

# How to apply a transformation from a module

The `TransformationInterface` is a powerful and handy way to modify your template's design easily.
Here are the interface details:

```php
<?php
namespace PrestaShop\PrestaShop\Core\MailTemplate\Transformation;

interface TransformationInterface
{
    /**
     * @param string $templateContent
     * @param array $templateVariables
     *
     * @return string
     */
    public function apply($templateContent, array $templateVariables);

    /**
     * Returns the type of templates this transformation is associated with,
     * either html or txt, so that the renderer knows if it has to be applied
     * or not
     *
     * @return string
     */
    public function getType();

    /**
     * @param LanguageInterface $language
     *
     * @return $this
     */
    public function setLanguage(LanguageInterface $language);
}
```

The `apply` method is the most important, it receives the rendered layout as a string, you can then perform replacement
or even DOM manipulation as long as your return the **whole** template as a string (if you don't want modify it simply
return the string unchanged).

The `getType` method is used to filter transformations (a transformation is only appliable) to **one** type, as for the
`setLanguage` method it will allow you to know the language used in this generation which is handy if you need to add
localized texts or images.

## Layout

For this example we will use the same layout we use in [How to add layout variables from a module]({{< ref "add-layout-variables-from-module" >}}):

```twig
{# modules/my_email_theme_module/mails/layout/customizable_modern_layout.html.twig #}
{% extends '@MailThemes/modern/components/layout.html.twig' %}

{% block content %}
  <table width="100%">
    <tr>
      <td align="center" class="titleblock">
        <font size="2" face="{{ languageDefaultFont }}Open-sans, sans-serif" color="#555454">
          <span class="title">{{ 'This is an example mail template from my module for modern theme'|trans({}, 'EmailsBody', locale)|raw }}</span>
        </font>
      </td>
    </tr>
    <tr>
      <td align="center" class="titleblock">
        <font size="2" face="{{ languageDefaultFont }}Open-sans, sans-serif" color="#555454">
          <span class="subtitle">{{ customMessage }}</span>
        </font>
      </td>
    </tr>
    <tr>
      <td class="space_footer">&nbsp;</td>
    </tr>
  </table>
{% endblock %}
```

Note the `<span class="subtitle">` that contains the custom message, we will use a CSS selector for our transformation.

## The Transformation class

In this example we are going to create a class implementing the `TransformationInterface`. Its purpose is to change the color
of all the `<span>` tags with the `subtitle` class.

```php
<?php
namespace PrestaShop\Module\MyEmailThemeModule\MailTemplate\Transformation;

use PrestaShop\PrestaShop\Core\Exception\InvalidArgumentException;
use PrestaShop\PrestaShop\Core\MailTemplate\MailTemplateInterface;
use PrestaShop\PrestaShop\Core\MailTemplate\Transformation\AbstractTransformation;
use Symfony\Component\DomCrawler\Crawler;
use DOMElement;

/**
 * Class CustomMessageColorTransformation adds the custom color to all spans
 * with class subtitle.
 */
class CustomMessageColorTransformation extends AbstractTransformation
{
    /** @var string */
    private $customColor;

    /**
     * @param string $customColor
     * @throws InvalidArgumentException
     */
    public function __construct($customColor)
    {
        parent::__construct(MailTemplateInterface::HTML_TYPE);
        $this->customColor = $customColor;
    }

    /**
     * @inheritDoc
     */
    public function apply($templateContent, array $templateVariables)
    {
        $crawler = new Crawler($templateContent);
        $customSpans = $crawler->filter('span[class="subtitle"]');
        /** @var DOMElement $customSpan */
        foreach ($customSpans as $customSpan) {
            $customSpan->setAttribute('style', sprintf('color: %s;', $this->customColor));
        }

        return $crawler->html();
    }
}
```

## Using the hook

Now you need to add your transformation for this specific layout, in order to do so you will use
the `actionGetMailLayoutTransformations` hook.

```php
<?php
use PrestaShop\PrestaShop\Core\MailTemplate\MailTemplateInterface;
use PrestaShop\PrestaShop\Core\MailTemplate\MailTemplateRendererInterface;
use PrestaShop\PrestaShop\Core\MailTemplate\Layout\LayoutInterface;
use PrestaShop\PrestaShop\Core\MailTemplate\Transformation\TransformationCollectionInterface;
use PrestaShop\Module\MyEmailThemeModule\MailTemplate\Transformation\CustomMessageColorTransformation;

class MyEmailThemeModule extends Module 
{
   public function install() 
   {
        return parent::install()
            // This class constant contains 'actionGetMailLayoutTransformations'
            && $this->registerHook(MailTemplateRendererInterface::GET_MAIL_LAYOUT_TRANSFORMATIONS)
        ;
    }
    
    public function uninstall() 
    {
        return parent::uninstall()
            && $this->unregisterHook(MailTemplateRendererInterface::GET_MAIL_LAYOUT_TRANSFORMATIONS)
        ;        
    }
    
    public function enable() 
    {
        return parent::enable()
            && $this->registerHook(MailTemplateRendererInterface::GET_MAIL_LAYOUT_TRANSFORMATIONS)
        ;
    }
    
    public function disable() 
    {
        return parent::disable()
            && $this->unregisterHook(MailTemplateRendererInterface::GET_MAIL_LAYOUT_TRANSFORMATIONS)
        ;        
    }
    
    /**
     * @param array $hookParams
     */
    public function hookActionGetMailLayoutTransformations(array $hookParams)
    {
        if (!isset($hookParams['templateType']) ||
            MailTemplateInterface::HTML_TYPE !== $hookParams['templateType'] ||
            !isset($hookParams['mailLayout']) ||
            !isset($hookParams['layoutTransformations'])) {
            return;
        }

        /** @var LayoutInterface $mailLayout */
        $mailLayout = $hookParams['mailLayout'];
        if ($mailLayout->getModuleName() != $this->name) {
            return;
        }

        /** @var TransformationCollectionInterface $transformations */
        $transformations = $hookParams['layoutTransformations'];
        $transformations->add(new CustomMessageColorTransformation('#FF0000'));
    }
}
```

You can then go to the "Design > Email Theme" page and preview your layout you will see that your message has now changed its color.

{{< figure src="../img/modern_transformed_template.png" title="Your customizable template" >}}
