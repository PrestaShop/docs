---
title: How to add an email theme from a module
menuTitle: Adding a theme
weight: 30
---

# How to add an email theme from a module

Now, what if you want to add a whole new email theme? Of course one possibility is to add a new theme folder in `mails/themes/` but it's not the most convenient if you want to install/uninstall it easily and quickly, so let's integrate the theme in a module.

Just like we did to [add a layout from a module]({{< ref "add-a-layout-from-module" >}}) we are going to use the `actionListMailThemes` hook, except this time we are going to add a whole email theme. Now to ease things a bit we can use `FolderThemeScanner` used by the core to scan its own themes. 

## Using the hook

```php
<?php
use PrestaShop\PrestaShop\Core\MailTemplate\Layout\Layout;
use PrestaShop\PrestaShop\Core\MailTemplate\ThemeCatalogInterface;
use PrestaShop\PrestaShop\Core\MailTemplate\ThemeCollectionInterface;
use PrestaShop\PrestaShop\Core\MailTemplate\ThemeInterface;
use PrestaShop\PrestaShop\Core\MailTemplate\FolderThemeScanner;

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

        $scanner = new FolderThemeScanner();
        $darkTheme = $scanner->scan(__DIR__.'/mails/themes/dark_modern');
        if (null !== $darkTheme && $darkTheme->getLayouts()->count() > 0) {
            $themes->add($darkTheme);
        }
    }
}
```

You can then go to the "Design > Email Theme" page and preview the `dark_modern` theme.

{{< figure src="../img/dark_modern_theme.png" title="Dark modern theme available" >}}
