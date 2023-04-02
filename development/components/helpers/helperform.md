---
title: HelperForm
---

# The HelperForm component

This helper can used to generate HTML forms easily.

{{% notice note %}}
Note that HelperForm is based on Smarty and Bootstrap 3, and therefore is discouraged in Symfony controllers.
{{% /notice %}}

{{< searchTags tags="FormHelper, HelperTable" >}}

## Basic usage

Removing all the optional fields, this is how to build a basic HelperForm element:

```php
$helper = new HelperForm();
$form = [
    [
        'form' => [
            'legend' => [       
                'title' => $this->l('Edit carrier'),       
                'icon' => 'icon-cogs'   
            ],   
            'input' => [       
                [           
                    'type' => 'text',
                    'name' => 'shipping_method',
                ],
            ],
            'submit' => [
                'title' => $this->l('Save'),       
                'class' => 'btn btn-default pull-right'   
            ],
        ],
    ],
];
$helper->generateForm($form);
```

This specific code generates this HTML code:

```html
<form id="configuration_form" method="post">
   <div class="panel" id="fieldset_0">
      <div class="panel-heading">
         <i class="icon-cogs"></i>Edit carrier
      </div>
      <div class="form-wrapper">
         <div class="form-group">
            <input type="text" class="" value="" id="shipping_method" name="shipping_method">
         </div>
      </div>
      <div class="panel-footer">
         <input type="submit" class="btn btn-default pull-right" name="" value="Save" id="_form_submit_btn">
      </div>
   </div>
</form>
```

To learn more about the `$form` array structure, read the [Form declaration section](#form-declaration) below.

## Attributes

`$allow_employee_form_lang: int`
:  
   _This defaults to `0` and has no effect since PrestaShop 1.7._

`$back_url: string`
:  
   _This defaults to `#` and has no effect since PrestaShop 1.7._

`$currentIndex: string`
:  
   This URL will be set as the form's `action`.

`$default_form_language: int` (required)
:  
   Default language id (notably for multi language fields).

`$fields_form: array`
:  
   Form structure, as described in the [Form declaration section](#form-declaration) below.

`$fields_value: array`
:  
   Form values, using field names as keys.

`$first_call: bool`
:  
   This defaults to `true`. Set to `false` to avoid injecting scripts again when displaying more than one form in a single page.

`$id: string`
:  
   Value for the ID field (see `$identifier` below).

`$identifier: string`
:  
   Name of the ID field in the table where data is stored, if applicable. If present, a hidden field named the same as this variable will be added, and its value will be set to the `$id` attribute. 

`$languages: array`
:  
   List of active languages, indexed by `id_lang`. You can usually get this from `AdminController::getLanguages()`.  
   The expected structure is: `array<int, array{id_lang: int, iso_code: string, is_default: bool, name: string}>`.

`$module: Module`
:  
   Instance of the module using this form. This is only needed to allow the module to override the form's template.

`$name_controller: string`
:  
   If set, this will:

   - Add a class of the same name to the `<form>` tag.
   - Execute a hook named `display<$name_controller>Form` at the bottom of each fieldset.

`$show_cancel_button: bool`
:  
   This defaults to `false`. If set to `true`, a cancel button is displayed at the bottom of the form. Clicking on it returns to the previous page in the browser's history. 

`$show_toolbar: bool`
:  
   _This defaults to `false` and has no effect since PrestaShop 1.7._

`$submit_action: string`
:  
   This property handles a hidden field of the same name that will be added to the form, with its value set to `"1"`. This will also be used as default name for the submit button, unless otherwise specified in the form's input configuration.

   If not defined, its default value is `"submitAdd{$table}"` (read about `$table` below).

`$table: string`
:  
   Table name where the data is stored, without prefix (e.g. `"configuration"`). This is only required in the following cases:

   - If `$submit_action` has not been defined.
   - If the form includes a `shop` (shop association) input field.
   - If there are multiple forms on the same page.
   
`$title: string`
:  
   _This default to `null` and has no effect since PrestaShop 1.7._

`$token: string`
:  
   CSRF token that will be appended to the form's action URL, if `$currentIndex` is defined.

`$toolbar_scroll: bool`
:  
   _This defaults to `false` and has no effect since PrestaShop 1.7._

`$tpl_vars: array`
:  
   This allows you to add new Smarty variables to the template or override the ones set by HelperForm.


## Form declaration

The form declaration follows a precise schema. At its root, it's a collection of form sections, also referred to as "fieldsets". Each form section contains exactly one "form" declaration, like this:

```php
$form = [
   $firstSectionId => ['form' => $firstSectionDeclaration],
   $secondSectionId => ['form' => $secondSectionDeclaration],
   // ...more sections
];
```

It's usually not necessary to set up identifiers for the forms sections, and most forms will only have one section, like so:

```php
$form = [
    ['form' => $formDeclaration]
];
```

`$formDeclaration` is an array containing several properties, explained below.


### Section heading

The `legend` property lets you configure the form's heading.

```php
$formDeclaration['legend'] = [
    'icon'  => 'icon-cogs',                // Icon to display next to the tile
    'image' => '//url/image.png',          // URL of an image that will be displayed next to the title
    'title' => $this->l('Edit carrier'),   // (Required) Title for this form section.
];
```

### Messages

You can display different messages at the top of the form by declaring the appropriate property.

```php
$formDeclaration = [
    'description' => $this->l('This form is used for doing foo bar'),
    'warning'     => $this->l('Warning: dangerous stuff ahead!'),
    'succcess'    => $this->l('Form saved!'),
    'error'       => $this->l('Oops, something went wrong.'),
];
```

### Buttons

You can add a submit button to the form by setting the `submit` property.

```php
$formDeclaration['submit'] = [
    'id' => 'send',        // If not defined, this will take the value of "{$table}_form_submit_btn"
    'icon' => 'icon-save', // Icon to show
    'name' => 'send',      // If not defined, this will take the value of the $submit_action property
    'stay' => false,       // If true, this will append "AndStay" to the name
    'class' => '',         // CSS class to add
    'title' => 'Save',     // Button label
];
```

To add a reset button, declare the `reset` property. It has most of the same values as `submit`:

```php
$formDeclaration['reset'] = [
    'id' => 'reset',        // If not defined, this will take the value of "{$table}_form_reset_btn"
    'icon' => 'icon-reset', // Icon to show, if any
    'class' => '',          // CSS class to add
    'title' => 'Reset',     // Button label
];
```

It's possible to add any number of supplementary buttons, by declaring the `buttons` array:

```php
$formDeclaration['buttons'] = [
    [
        'href' => '//url',          // If this is set, the button will be an <a> tag
        'js'   => 'someFunction()', // Javascript to execute on click
        'class' => '',              // CSS class to add
        'type' => 'button',         // Button type
        'id'   => 'mybutton',
        'name' => 'mybutton',       // If not defined, this will take the value of "submitOptions{$table}"
        'icon' => 'icon-foo',       // Icon to show, if any
        'title' => 'Do stuff',      // Button label
    ],
    [
        // more buttons
    ]
];
```

{{% notice note %}}
All buttons are added at the bottom of the form's section. Each section may have its own submit button, but all sections are part of the same form.
{{% /notice %}}

### Fields

The `input` property takes an array that defines the form's structure. Using the various offered possibilities, you can build just about any type of form, and be assured that it will comply with PrestaShop's style and form processing.

You can use as many element arrays as necessary for your form, one after the other.

Example:

```php
$formDeclaration['input'] = [
    [
        'type' => 'text',
        'name' => 'my_field',
        // ...more properties    
    ],
    [
        // ...another field
    ],
]
```

Each field definition has different properties, depending on the chosen type.

`$type: string` (required)
:  
   Input type. Can be one of the following:  
   `text`, `select`, `textarea`, `radio`, `checkbox`, `file`, `shop`, `asso_shop`, `free`, `color`

`$label: string`
:  
   Input label. Theoretically optional, but in reality each field has to have a label.

`$name: string` (required)
:  
   Field name. This will define name of the object property from which we get the value.

`$required: bool`
:  
   False by default. If true, PrestaShop will add a red star next to the field.

`$desc: string`
:  
   Description displayed under the field.

`$hint: string`
:  
   This hint is displayed when the mouse hovers the field.

`$suffix: string`
:  
   This is displayed after the field (e.g. to indicate the unit of measure).

`$empty_message: string`
:  
   Mesage to display when the field is empty.

`$lang: bool`
:  
   False by default. If true, it indicates that the field is multi language.

#### Text input

Here is how to generate a basic `<input>` element:

```php
array(
  'type'     => 'text',                             // This is a regular <input> tag.
  'label'    => $this->l('Name'),                   // The <label> for this <input> tag.
  'name'     => 'name',                             // The content of the 'id' attribute of the <input> tag.
  'class'    => 'lg',                                // The content of the 'class' attribute of the <input> tag. To set the size of the element, use these: sm, md, lg, xl, or xxl.
  'required' => true,                               // If set to true, this option must be set.
  'desc'     => $this->l('Please enter your name.') // A help text, displayed right next to the <input> tag.
),
```

#### Select

Here is how to generate a `<select>` element:

```php
array(
  'type' => 'select',                              // This is a <select> tag.
  'label' => $this->l('Shipping method:'),         // The <label> for this <select> tag.
  'desc' => $this->l('Choose a shipping method'),  // A help text, displayed right next to the <select> tag.
  'name' => 'shipping_method',                     // The content of the 'id' attribute of the <select> tag.
  'required' => true,                              // If set to true, this option must be set.
  'options' => array(
    'query' => $options,                           // $options contains the data itself.
    'id' => 'id_option',                           // The value of the 'id' key must be the same as the key for 'value' attribute of the <option> tag in each $options sub-array.
    'name' => 'name'                               // The value of the 'name' key must be the same as the key for the text content of the <option> tag in each $options sub-array.
  )
),
```

The content of the select is stored in the `$options` variable, which is an array of arrays. It must contain two keys: id and name.

`$options` can take this value:

```php
$options = array(
  array(
    'id_option' => 1,       // The value of the 'value' attribute of the <option> tag.
    'name' => 'Method 1'    // The value of the text content of the  <option> tag.
  ),
  array(
    'id_option' => 2,
    'name' => 'Method 2'
  ),
);
```

...but of course, you would be better off generating such an array of arrays yourself, from the data stored in PrestaShop. For instance, here is how to display a gender (social title) selector:

```php
$options = array();
foreach (Gender::getGenders((int)Context::getContext()->language->id) as $gender)
{
  $options[] = array(
    "id" => (int)$gender->id,
    "name" => $gender->name
  );
}
```

#### Checkbox

Here is how to generate a `<input>` of type "checkbox":

```php
array(
  'type'    => 'checkbox',                   // This is an <input type="checkbox"> tag.
  'label'   => $this->l('Options'),          // The <label> for this <input> tag.
  'desc'    => $this->l('Choose options.'),  // A help text, displayed right next to the <input> tag.
  'name'    => 'options',                    // The content of the 'id' attribute of the <input> tag.
  'values'  => array(
    'query' => $options,                     // $options contains the data itself.
    'id'    => 'id_option',                  // The value of the 'id' key must be the same as the key
                                             // for the 'value' attribute of the <option> tag in each $options sub-array.
    'name'  => 'name'                        // The value of the 'name' key must be the same as the key
                                             // for the text content of the <option> tag in each $options sub-array.
  'expand' => array(                         // You can hide the checkboxes when there are too many.
                                             
    'print_total' => count($options),        // A button appears with the number of options it hides.
    'default' => 'show',                     // 'show' will show by default, whereas 'hide' will do the opposite.
    'show' => array('text' => $this->l('show'), 'icon' => 'plus-sign-alt'),
    'hide' => array('text' => $this->l('hide'), 'icon' => 'minus-sign-alt')
  ),
),
```

Just as for a selector input, check boxes take an array of arrays as the value of $options.

#### Radio button

Here is how to generate a `<input>` of type "radio":

```php
array(
  'type'      => 'radio',                               // This is an <input type="checkbox"> tag.
  'label'     => $this->l('Enable this option'),        // The <label> for this <input> tag.
  'desc'      => $this->l('Are you a customer too?'),   // A help text, displayed right next to the <input> tag.
  'name'      => 'active',                              // The content of the 'id' attribute of the <input> tag.
  'required'  => true,                                  // If set to true, this option must be set.
  'class'     => 't',                                   // The content of the 'class' attribute of the <label> tag for the <input> tag.
  'is_bool'   => true,                                  // If set to true, this means you want to display a yes/no or true/false option.
                                                        // The CSS styling will therefore use green mark for the option value '1', and a red mark for value '2'.
                                                        // If set to false, this means there can be more than two radio buttons,
                                                        // and the option label text will be displayed instead of marks.
  'values'    => array(                                 // $values contains the data itself.
    array(
      'id'    => 'active_on',                           // The content of the 'id' attribute of the <input> tag, and of the 'for' attribute for the <label> tag.
      'value' => 1,                                     // The content of the 'value' attribute of the <input> tag.   
      'label' => $this->l('Enabled')                    // The <label> for this radio button.
    ),
    array(
      'id'    => 'active_off',
      'value' => 0,
      'label' => $this->l('Disabled')
    )
  ),
),
```

Note that you have to use the "t" CSS class on your labels in order to have the proper styling (but you can redefine that class using the "class" variable).

#### Other HTML elements

The type variable of the element declaration makes it possible to generate just about any kind of `<input>` element: `text`, `select`, `textarea`, `radio`, `checkbox`, `file` and many others! See the list of available types [here](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Input). 

You can also use some PrestaShop specific: `shop`, `asso_shop`, `free`, `color`. Try them out!

## Example usage in native modules

`HelperForm` is implemented into several native modules, such as [`ContactForm`](https://github.com/PrestaShop/contactform).

In this module, 

- a [`renderForm()` method is created](https://github.com/PrestaShop/contactform/blob/v4.4.1/contactform.php#L108), 
- the [`form declaration is declared](https://github.com/PrestaShop/contactform/blob/v4.4.1/contactform.php#L120-L189), 
- then a [`HelperForm` is instantiated](https://github.com/PrestaShop/contactform/blob/v4.4.1/contactform.php#L190),
- finally the html content is [generated and returned](https://github.com/PrestaShop/contactform/blob/v4.4.1/contactform.php#L203). 

```php
/**
 * @return string
*/
protected function renderForm()
{
   $form = [
      // ... form declaration as described on this page
      // refer to https://github.com/PrestaShop/contactform/blob/v4.4.1/contactform.php#L120-L189
      // for complete implementation
   ];

   $helper = new HelperForm();
   // HelperForm settings, refer to https://github.com/PrestaShop/contactform/blob/v4.4.1/contactform.php#L190-L201
   // for complete implementation

   return $helper->generateForm([$form]);
}
```

Then, in the `getContent()` method of this module, the `renderForm()` method is called:

```php
/**
 * @return string
   */
public function getContent()
{
   // ...
   $html .= $this->renderForm();
   // ...
   return $html;
}
```