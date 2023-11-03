---
title: Tips and tricks
weight: 50
---

# Translation tips and tricks

## Adding new wordings

For a wording to become translatable through the Back office interface, it has to be made available to it. PrestaShop behaves differently according to whether the wordings belong to the Core or to 3rd party modules & themes.

### Module and theme wordings

Wordings from modules and themes (except Native modules and the _Classic_ theme) are automatically scanned from source code at runtime, so you can just use them in the code and they will magically appear in the translation interface — as long as you follow the coding and domain name conventions.

### Core wordings

Wordings from the Core (used in Back office, Front office, the _Classic_ theme, Native modules, and built-in Emails) need to be present in the "default" translation catalogue files, located in the `./translations/default` folder. This means that any new Core wording that is used in the code needs to be added there too.

If your new wordings will be included in a release (i.e. if you're contributing to the project), you don't need to manually extract and add them to the default catalogue. They will be added by the release manager later, during the preparation for the next minor or major release.

If you are modifying PrestaShop for your own project, you must manually add your new wordings to the default catalogue:

1. Find the translation file for the domain you are using (eg. `translations/default/ShopFormsErrors.xlf`) or create one from scratch if it doesn't exist.

2. Add a `trans-unit` block for every new wording:

   ```xml
   <trans-unit id="cf8092a0be7b972d6cee3db90bfaf923">
       <source>You cannot access this store from your country. We apologize for the inconvenience.</source>
       <target>You cannot access this store from your country. We apologize for the inconvenience.</target>
       <note></note>
   </trans-unit>
   ```

   * The `id` property has no effect on PrestaShop but by convention must be unique. We use an MD5 checksum of the wording itself.
   * The content of `<source>` and `<target>` must be the same.
   * You can add your new `<trans-unit>` elements within the body of an existing `<file>` element, or create a new one — it has no effect.
     
## Making wordings detectable

PrestaShop's [TranslationToolsBundle](https://github.com/PrestaShop/TranslationToolsBundle) leverages static analysis to detect any new wording in the source code automatically, either at runtime (for modules and themes), or when preparing a release (for core wordings).

To ensure your wordings are detected, make sure to follow these guidelines when using translation in your code:

1. Only wordings used through the `trans()` function, the `{l}` Smarty tag, and the `trans` Twig filter can be detected automatically. Therefore, only wordings present in `.php`, `.tpl`, and `.twig` files will be detected.

2. **Always pass wordings as string literals, not variables**, with the `trans()` function, the `{l}` Smarty tag, and `trans` Twig filter. Although variables would be interpreted at runtime, the code analyzer won't be able to figure out the link between the symbol and its assigned value. Passing variables as arguments to these functions will prevent those wordings from being detected.

{{% notice warning %}}
Failure to comply with these guidelines will result in the wording not being detected, and not appearing in the translation interface!
{{% /notice %}}

{{% notice note %}}
**Be aware:**  Wordings will be detected regardless of whether the file is actually imported or its code is reachable during runtime.
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

When creating Symfony `ChoiceType` form fields:

1. Declare the `choices` field as literal (untranslated) strings.
2. Set `choice_translation_domain` as the translation domain for all the choices.

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
                'required' => false,
                'label' => $this->trans('This is a select box', 'Admin.Catalog.Feature'),
                'choices' => [
                    'First option' => 0,
                    'Second option' => 1,
                    'Third option' => 2,
                ],
                'choice_translation_domain' => 'Admin.Some.Domain',
            ]);
    }
}
```

The form above declares a Choice field (select box), with three different options. 

{{% notice note %}}
**Be aware:** the analyzer expects the `ChoiceType` declaration to be inside a call to the `add()` method, using `ChoiceType::class` and not a FQCN. If in doubt, have a look at [ChoiceExtractor](https://github.com/PrestaShop/TranslationToolsBundle/blob/master/Translation/Extractor/Visitor/Translation/FormType/ChoiceExtractor.php).
{{% /notice %}}


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

