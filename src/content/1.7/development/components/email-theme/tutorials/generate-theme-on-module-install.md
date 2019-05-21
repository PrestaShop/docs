---
title: How to generate an email theme on module installation?
weight: 14
---

# How to generate an email theme on module installation?

You've learnt how to extend and add layouts in a theme by using the miscellaneous hooks available in the
email generation workflow. However when are these new templates generated? We've seen that the automatic
generation happens on Language installation. You can also generate the emails manually via the back office.

But this is not very convenient when you install a new module that integrates new layouts or even a new theme.
So in this tutorial you are going to learn how to start a generation process when you install your module.

### Use the GenerateThemeMailTemplatesCommand   

As we explained in the [workflow](../../#workflow) the `GenerateThemeMailTemplatesCommand` is the starting point
of the generation process. Here is how you can dispacth it properly on installation:

```php
use PrestaShop\PrestaShop\Adapter\SymfonyContainer;
use PrestaShop\PrestaShop\Adapter\LegacyContext;
use PrestaShop\PrestaShop\Core\CommandBus\CommandBusInterface;
use PrestaShop\PrestaShop\Core\Domain\MailTemplate\Command\GenerateThemeMailTemplatesCommand;

class my_email_theme_module {
    public function install() {
        return parent::install()
            && $this->generateTheme()
        ;
    }

    public function enable() {
        return parent::enable()
            && $this->generateTheme()
        ;
    }

    /**
     * Generate modern theme via the command bus (always return true to avoid blocking the installation)
     *
     * @return bool
     */
    private function generateTheme()
    {
        $sfContainer = SymfonyContainer::getInstance();
        if (null === $sfContainer) {
            return true;
        }

        /** @var CommandBusInterface $commandBus */
        $commandBus = $sfContainer->get('prestashop.core.command_bus');
        if (null === $commandBus) {
            return true;
        }

        /** @var LegacyContext $legacyContext */
        $legacyContext = $sfContainer->get('prestashop.adapter.legacy.context');
        $languages = $legacyContext->getLanguages();

        //IMPORTANT NOTICES
        //Clear the cache for Hook::getHookModuleExecList or the hooks won't be correctly executed
        Cache::clear();

        //Since the module was not active when the install started the autoload was not loaded automatically
        //so we load it manually here
        require_once __DIR__ . '/vendor/autoload.php';

        $mailTheme = Configuration::get('PS_MAIL_THEME');
        /** @var array $language */
        foreach ($languages as $language) {
            /** @var GenerateThemeMailTemplatesCommand $generateCommand */
            $generateCommand = new GenerateThemeMailTemplatesCommand(
                $mailTheme,
                $language['locale'],
                false //It is recommended to disable `overwrite` option, as we just want to generate the missing templates
            );
            try {
                $commandBus->handle($generateCommand);
            } catch (CoreException $e) {
            }
        }

        return true;
    }
}
```

With this any additional layout you may have added through a hook will be generated when you install/enable your module.
