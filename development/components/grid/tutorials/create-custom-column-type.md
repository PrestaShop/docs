---
title: How to create a custom Column Type
menuTitle: Custom Column Type
weight: 9
---

# How to create a custom Column Type

You may need to display some kind of data in a specific format. This is how to do it: 


## Step 1. Define the new column type

Let's assume that we need to make an html column to display an object's ID within a `&lta>` html tag: 
Create the following file:

```/modules/your_cool_module/src/Core/Grid/Column/Type/HtmlColumn.php```
```php
namespace PrestaShop\Module\Yourcoolmodule\Core\Grid\Column\Type;

use PrestaShop\PrestaShop\Core\Grid\Column\AbstractColumn;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class HtmlColumn extends AbstractColumn
{
    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'html';
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver
            ->setRequired([
                'field',
            ])
            ->setDefaults([
                'clickable' => false,
            ])
            ->setAllowedTypes('field', 'string')
            ->setAllowedTypes('clickable', 'bool');
    }
}
```

## Step 2. Use & call the new type

Go to
```/modules/your_cool_module/src/Core/Grid/Definition/Factory/YourCoolGridDefinitionFactory.php```.

In the space above "final class" add the line below:

```use PrestaShop\Module\Yourcoolmodule\Core\Grid\Column\Type\HtmlColumn;```

Then inside the getColumns function among other columns, you are welcome to use the following code snippet:

```php
->add(
    (new HtmlColumn('some_column'))
        ->setName($this->trans('Print voucher', [], 'Modules.Yourcoolmodule.Admin'))
        ->setOptions([
            'field' => 'identifier_column'
        ])
)
```

## Step 3. Define the respective .html.twig
Let's assume that we need to make an html column to fire some js script. Create the following file:

```/modules/your_cool_module/views/PrestaShop/Admin/Common/Grid/Columns/Content/html.html.twig```

```<a href="#">{{ record[column.options.field] }}</a>```

This (quite simplified) scenario above will produce a column with an empty ```<a>``` tag containing the object id as text.
