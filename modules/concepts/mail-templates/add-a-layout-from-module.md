---
title: How to add a layout in a theme from a module
menuTitle: Adding a layout
weight: 20
---

# How to add a layout in a theme from a module

You can add your own mail layouts from your module, they will then be included during
email generation. Each time you install a language or if you generate them via the back
office your layout will be rendered, translated and exported in the appropriate folders.

Let's assume for this example you want to add your layout for both themes `classic` and `modern`.
You will first have to prepare your layouts, let's say you store them in the `mail/layouts` folder
of your module.

## Layouts

```twig
{# modules/my_email_theme_module/mails/layout/custom_classic_layout.html.twig #}

{# You can use the theme layout (if present) to extend it easily #}
{% extends '@MailThemes/classic/components/layout.html.twig' %}

{% block content %}
  <tr>
    <td align="center" class="titleblock">
      <font size="2" face="{{ languageDefaultFont }}Open-sans, sans-serif" color="#555454">
        <span class="title">{{ 'This is an example mail template from my module for classic theme'|trans({}, 'EmailsBody', locale)|raw }}</span>
      </font>
    </td>
  </tr>
  <tr>
    <td class="space_footer">&nbsp;</td>
  </tr>
{% endblock %}
```

```twig
{# modules/my_email_theme_module/mails/layout/custom_modern_layout.html.twig #}
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
      <td class="space_footer">&nbsp;</td>
    </tr>
  </table>
{% endblock %}
```

## Using the hook

Now you need to add your layout to the theme's layout collection, in order to do so you will use 
the `actionListMailThemes` hook.

```php
<?php
use PrestaShop\PrestaShop\Core\MailTemplate\Layout\Layout;
use PrestaShop\PrestaShop\Core\MailTemplate\ThemeCatalogInterface;
use PrestaShop\PrestaShop\Core\MailTemplate\ThemeCollectionInterface;
use PrestaShop\PrestaShop\Core\MailTemplate\ThemeInterface;

class MyEmailThemeModule extends Module 
{
    public function install() 
    {
        return parent::install()
            // This class constant contains 'actionListMailThemes'
            && $this->registerHook(ThemeCatalogInterface::LIST_MAIL_THEMES_HOOK)
        ;
    }

    public function uninstall() 
    {
        return parent::uninstall()
            && $this->unregisterHook(ThemeCatalogInterface::LIST_MAIL_THEMES_HOOK)
        ;
    }

    public function enable() 
    {
        return parent::enable()
            && $this->registerHook(ThemeCatalogInterface::LIST_MAIL_THEMES_HOOK)
        ;
    }

    public function disable() 
    {
        return parent::disable()
            && $this->unregisterHook(ThemeCatalogInterface::LIST_MAIL_THEMES_HOOK)
        ;
    }

    /**
     * @param array $hookParams
     */
    public function hookActionListMailThemes(array $hookParams)
    {
        if (!isset($hookParams['mailThemes'])) {
            return;
        }

        /** @var ThemeCollectionInterface $themes */
        $themes = $hookParams['mailThemes'];

        /** @var ThemeInterface $theme */
        foreach ($themes as $theme) {
            if (!in_array($theme->getName(), ['classic', 'modern'])) {
                continue;
            }

            // Add a layout to each theme (don't forget to specify the module name)
            $theme->getLayouts()->add(new Layout(
                'custom_template',
                __DIR__ . '/mails/layouts/custom_' . $theme->getName() . '_layout.html.twig',
                '',
                $this->name
            ));
        }
    }
}
```

You can then go to the "Design > Email Theme" page and preview the `classic` or `modern` layouts list.

{{< figure src="../img/custom_template_list.png" title="Your custom template are now in the themes' layout list" >}}
