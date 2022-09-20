---
title: How to extend a layout in a theme from a module
menuTitle: Extending a layout
weight: 10
---

# How to extend a layout in a theme from a module

Sometimes you may want to use the provided email theme but you would like to add some information or change the header/footer. One of the advantages of new theme layouts is that they use Twig so you can take advantage of its extension and blocks features.

## Layout

```twig
{% extends '@MailThemes/modern/core/order_conf.html.twig' %}

{% block content %}
  {{ parent() }}
  <table width="100%">
    <tr>
      <td align="center" class="titleblock" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; direction: ltr; font-size: 0px; padding: 0 50px; text-align: center; vertical-align: top;">
        <div  style="font-family:Open sans, arial, sans-serif;font-size:14px;line-height:25px;text-align:left;color:#555454;">
          {{ 'Thank you for purchasing this product on our store. Feel free to leave us a review if you are happy of this product:'|trans({}, 'EmailsBody', locale)|raw }}
          <a href="{shop_url}/post_review">{{ 'Post a review'|trans({}, 'EmailsBody', locale)|raw }}</a>
        </font>
      </td>
    </tr>
  </table>
{% endblock %}
```

## Using the hook

Now you need to add your layout to the theme's layout collection, in order to do so you will use 
the `actionListMailThemes` hook.

```php
<?php
use PrestaShop\PrestaShop\Core\MailTemplate\Layout\LayoutInterface;
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
        $theme = $themes->getByName('modern');
        if (!$theme) {
            return;
        }

        // First parameter is the layout name, second one is the module name (empty value matches the core layouts)
        $orderConfLayout = $theme->getLayouts()->getLayout('order_conf', '');
        if (null === $orderConfLayout) {
            return;
        }

        //The layout collection extends from ArrayCollection so it has more feature than it seems..
        //It allows to REPLACE the existing layout easily
        $orderIndex = $theme->getLayouts()->indexOf($orderConfLayout);
        $theme->getLayouts()->offsetSet($orderIndex, new Layout(
            $orderConfLayout->getName(),
            __DIR__ . '/mails/layouts/order_conf.html.twig',
            ''
        ));
    }
}
```

You can then go to the "Design > Email Theme" page and preview the `modern` **order_conf** layout.

{{< figure src="../img/extended_order_conf_layout.png" title="Your order_conf layout has been extended' layout list" >}}
