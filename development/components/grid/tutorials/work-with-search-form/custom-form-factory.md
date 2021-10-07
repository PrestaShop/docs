---
title: Create your custom form factory
menuTitle: Custom form factory
weight: 1
---

# Create your custom form factory

In some cases the generic form factory is not enough for your need. In PrestaShop the category grid has three specific features:

- it can manage a parent category which changes the grid rendering (only displays children) so it needs to dynamically add a parameter
- its search url doesn't match the list so it needs to specify the form action
- the redirection url is dynamic so that it takes the parent category into account 

To manage this additional behaviour we create a decorator that uses the default form factory but adds specific behaviour.

## Decorate the default factory

{{% notice note %}}
In those examples we use decorator that are based on the default grid factory. But you could create a fully autonomous class as long as it implements the `GridFilterFormFactoryInterface`.
{{% /notice %}}

### Factory decorator

```php
<?php
/**
 * Class CategoryFilterFormFactory decorates original filter factory to add custom submit action.
 */
final class CategoryFilterFormFactory implements GridFilterFormFactoryInterface
{
    /**
     * @var GridFilterFormFactoryInterface
     */
    private $formFactory;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @param GridFilterFormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     * @param RequestStack $requestStack
     */
    public function __construct(
        GridFilterFormFactoryInterface $formFactory,
        UrlGeneratorInterface $urlGenerator,
        RequestStack $requestStack
    ) {
        $this->formFactory = $formFactory;
        $this->urlGenerator = $urlGenerator;
        $this->requestStack = $requestStack;
    }

    /**
     * {@inheritdoc}
     */
    public function create(GridDefinitionInterface $definition)
    {
        // Use the default factory to build the form like usual
        $categoryFilterForm = $this->formFactory->create($definition);

        // Create a new empty form that will be used as an empty shell
        $newCategoryFormBuilder = $categoryFilterForm->getConfig()->getFormFactory()->createNamedBuilder(
            $definition->getId(),
            FormType::class
        );

        // Adds all the form types in the new form
        /** @var FormInterface $categoryFormItem */
        foreach ($categoryFilterForm as $categoryFormItem) {
            $newCategoryFormBuilder->add(
                $categoryFormItem->getName(),
                get_class($categoryFormItem->getConfig()->getType()->getInnerType()),
                $categoryFormItem->getConfig()->getOptions()
            );
        }

        $queryParams = [];

        if (null !== ($request = $this->requestStack->getCurrentRequest())
            && $request->query->has('id_category')
        ) {
            $queryParams['id_category'] = $request->query->get('id_category');
        }

        // Set the specific action in the new form
        $newCategoryFormBuilder->setAction(
            $this->urlGenerator->generate('admin_categories_search', $queryParams)
        );

        return $newCategoryFormBuilder->getForm();
    }
}
```

### Service definitions

```yaml
# your-module/config/services.yml
    # Define form factory decorator
    prestashop.core.grid.filter.category_form_factory:
        class: 'PrestaShop\PrestaShop\Core\Grid\Filter\CategoryFilterFormFactory'
        arguments:
            - '@prestashop.core.grid.filter.form_factory'
            - '@router'
            - '@request_stack'

    # Use the decorator in the grid factory instead of the default one
    prestashop.core.grid.factory.category:
        class: 'PrestaShop\PrestaShop\Core\Grid\GridFactory'
        arguments:
            - '@prestashop.core.grid.definition.factory.category'
            - '@prestashop.core.grid.data.factory.category_decorator'
            - '@prestashop.core.grid.filter.category_form_factory'
            - '@prestashop.core.hook.dispatcher'
```

## Simply change the action

If you just need to change the form action PrestaShop provides a `FilterFormFactoryFormActionDecorator` class that sets the action you need to use. All you need to do is define the services properly:

```yaml
# your-module/config/services.yml
    # Define form factory decorator
    prestashop.core.grid.filter.credit_slip_form_factory:
        class: 'PrestaShop\PrestaShop\Core\Grid\Filter\FilterFormFactoryFormActionDecorator'
        arguments:
            - '@prestashop.core.grid.filter.form_factory'
            - '@router'
            - 'admin_credit_slips_search' # You just need to specify your search route

    # Use the decorator in the grid factory instead of the default one
    prestashop.core.grid.factory.credit_slip:
        class: 'PrestaShop\PrestaShop\Core\Grid\GridFactory'
        arguments:
            - '@prestashop.core.grid.definition.factory.credit_slip'
            - '@prestashop.core.grid.data.factory.credit_slip_decorator'
            - '@prestashop.core.grid.filter.credit_slip_form_factory'
            - '@prestashop.core.hook.dispatcher'
```
