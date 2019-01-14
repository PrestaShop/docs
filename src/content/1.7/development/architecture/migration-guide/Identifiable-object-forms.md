---
title: Identifiable object Forms
weight: 30
---

# Identifiable object Forms

## Introduction

In PrestaShop, many forms represent an identifiable object data such as Cart, Product, Order, Customer and many others.
Each indentifiable object share common scenarios such as its creation, update or it's display. To wrap the common behavior is a must and
identifiable object is here for rescue. It allows to retrieve data and manipulate it by using following parts:

* _Form data provider_ - responsible for data retrieval.
* _Form builder_ - used for form building.

## Form data provider
Data retrieval is defined by two methods:

* **getData($id)** - function used to retrieve data by given id.

* **getDefaultData()** - used to retrieve default data.

### Creating form data provider

You don’t have to create the Form data provider by yourself but instead rely on `\PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider\FormDataProviderInterface`.

```php
final class ContactFormDataProvider implements FormDataProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getData($contactId)
    {
        return $this->getDataByContactId($contactId);
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultData()
    {
        return [
            'title' => 'service',
        ];
    }

    /**
     * Data which is being retrieved by contact id.
     *
     * @param int $contactId
     *
     * @return array
     */
    private function getDataByContactId($contactId)
    {
        return [
            'title' => 'Customer service',
        ];
    }
}
```

We have just created a basic Form data provider usage which will prefill our title with `Customer service` text but by default it will return `service` string.

## Form Builder

### Using Form builder