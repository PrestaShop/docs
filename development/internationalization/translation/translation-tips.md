---
title: Tips and tricks
weight: 50
---

# Translation tips and tricks

## Adding new wordings

Wordings for the Core and Native modules can only be translated if they are declared in PrestaShop's default translation catalogue. Therefore, whenever a new wording is added to the core or to a native module, it must be added to the default catalogue as well. 

Normally you would have to manually add each wording the appropriate default catalogue files (located in the `./translations/default` folder). Thankfully, this task has been automated by the Core team!
 
Before every minor release, the whole source code for PrestaShop and Native Modules is analyzed using [TranslationToolsBundle](https://github.com/PrestaShop/TranslationToolsBundle), and all newly discovered wordings are automatically added to the default catalogue.

{{% notice note %}}
Incidentally, the same technique is also used to detect wordings used by third-party modules and make them translatable through the Back Office interface.
{{% /notice %}}

### Making wordings discoverable for automated addition to the catalogue

TranslationToolsBundle uses static analysis to extract wordings from source code. Therefore, this means that you can simply use new wordings in the code, and they will be magically added to the catalogue later.

However, due to limitations of this technique, the following guidelines must be followed when declaring new wordings:

1. This tool only detects wordings used through the `trans()` function, the `{l}` Smarty tag, and the `trans` Twig filter. Therefore, they must be declared in a PHP, TPL, or TWIG file. They will be detected regardless of whether that code is actually used in runtime or not.

2. **Always use literal values, not variables, with the `trans()` function, the `{l}` Smarty tag, and `trans` Twig filter.** Although variables are interpolated at runtime, they won't be understood by the code analyzer, which only supports literals. Passing variables as arguments to these functions will prevent those wordings from being added to the catalogue.

{{% notice warning %}}
Failure to comply with these guidelines will result in the wording not being added to the catalogue and not being translatable!
{{% /notice %}}

Examples:

```php
<?php
// literal values will work
$this->trans('Some wording', [], 'Admin.Catalog.Feature');

// dynamic content can be injected using placeholders & replacements
$this->trans('Some wording with %foo%', ['%foo%' => $dynamicContent], 'Admin.Catalog.Feature');

// this won't work, the interpreter will ignore variables
$wording = 'Some wording';
$domain = 'Admin.Catalog.Feature';
$this->trans($wording, [], $domain);

// this will yield unexpected results
$this->trans('Some '. $var . ' wording', [], 'Admin.Catalog.Feature');

// dynamic behavior, like aliasing the trans() function, won't work well either
function translate($wording) {
   $this->trans($wording, [], 'Admin.Catalog.Feature');
}
```

In Twig files, you can use `trans_default_domain` to set up your default domain. Keep in mind this works on a per-file basis:

```twig
{% trans_default_domain 'Admin.Catalog.Feature' %}
{{ 'Hello world'|trans }}
{{ 'Something else'|trans }}
```

#### Form ChoiceTypes

When declaring Symfony form types, you declare choices for `ChoiceType` fields as literal (untranslated) strings:

```php
<?php
use PrestaShopBundle\Form\Admin\Type\TranslatorAwareType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SomeFormType extends TranslatorAwareType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('a_select_box', ChoiceType::class, [
                'choices' => [
                    'First option' => 0,
                    'Second option' => 1,
                    'Third option' => 2,
                ],
                'required' => false,
                'label' => $this->trans('This is a select box', 'Admin.Catalog.Feature'),
                'choice_translation_domain' => 'Admin.Some.Domain',
            ]);
    }
}
```

The form above declares a Choice field (select box), with three different options. 

Notice the declaration of `choice_translation_domain`. This explicit translation domain will be used to translate choices from this field.

**Note:** you must be careful when using this pattern: The analyzer expects the `ChoiceType` declaration to be inside a call to the `add()` method, using `ChoiceType::class` and not a FQCN.

{{% notice tip %}}
If in doubt, have a look at [ChoiceExtractor](https://github.com/PrestaShop/TranslationToolsBundle/blob/master/Translation/Extractor/Visitor/Translation/FormType/ChoiceExtractor.php) {{% /notice %}}

#### Array literals

You can declare wordings as arrays as well. This obviously won't translate the wordings at runtime but it will make them discoverable by the extractor.

```php
<?php
[
    'key' => 'This is a sample text',
    'domain' => 'Admin.Some.Feature',
    'parameters' => [],
];
```

## Translate core wordings

You can translate core wordings (mainly present in PHP files) via Classic theme translation interface.

{{% notice note %}}This tip also works if you don't use the Classic theme on your shop.{{% /notice %}}
