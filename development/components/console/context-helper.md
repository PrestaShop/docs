---
title: Context helper
---

# CLI Context helper

The legacy framework of PrestaShop was not built to be run from a Command Line.

The consequence is that many of its functions require specific data to be properly initialized, and these parts are being initialized when an HTTP request is handled by the framework.

In order to use legacy classes and components in Console, you need to initialize these parts. To make it easy, you can use the [LegacyContextLoader helper class](https://github.com/PrestaShop/PrestaShop/pull/21125).

It loads the needed property in `Context` using, when needed, a fake Employee or Controller instance.

It is available as a Symfony service `prestashop.adapter.legacy_context_loader`.

Example:

```
MyCustomCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this->setName('my-custom-command');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->get('prestashop.adapter.legacy_context_loader')->loadGenericContext();
        
        ...
    }
});
```

You can load a generic context thanks to `loadGenericContext()` or choose which data you want to initialize using the method of [LegacyContextLoader](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/LegacyContextLoader.php).
