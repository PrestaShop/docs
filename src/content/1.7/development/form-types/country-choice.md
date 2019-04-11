---
title: CountryChoiceType
menuTitle: CountryChoiceType
weight: 2
---

### CountryChoiceType

CountryChoiceType is a child of [ChoiceType](https://symfony.com/doc/current/reference/forms/types/choice.html),
it extends parent options with options listed bellow. It is used to display countries selection box and by default comes
with a list of countries from PrestaShop database.

#### Type fields

| Field                       | Type                                                                                    |
| --------------------------- | ----------------------------------------------------------------------------------------|
| Parent fields       | Parent type [ChoiceType](https://symfony.com/doc/current/reference/forms/types/choice.html)|  

#### Custom options

| Option                      | Type (default value)                      | Description                                     |
| ----------------------------| ------------------------------------------|-------------------------------------------------|
| **choices**                | **array**(Countries list from database, provided by CountryByIdChoiceProvider.php)| Choice list that is passed to parent 'choices'. Array should be formatted in `name => value` pairs.|

#### Example

```php
    // ...
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use PrestaShopBundle\Form\Admin\Type\CountryChoiceType;
    // ...
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ## this would provide default choices, which are the choices from PrestaShhop database
            ->add('country', CountryChoiceType::class)
        ;
    }
    
    // ...
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // ...
            ->add('country', CountryChoiceType::class, [
                ## in case you need custom list you can pass choices array
                'choices' => [
                    'France' => 1,
                    'Germany' => 2,
                    'Belgium' => 3,
                ],            
            ])
    // ...
    
```
