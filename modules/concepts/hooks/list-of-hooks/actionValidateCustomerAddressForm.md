---
menuTitle: actionValidateCustomerAddressForm
Title: actionValidateCustomerAddressForm
hidden: true
hookTitle: Customer address form validation
files:
  - classes/form/CustomerAddressForm.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionValidateCustomerAddressForm

## Informations

{{% notice tip %}}
**Customer address form validation:** 

This hook is called when a customer submit its address form
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/form/CustomerAddressForm.php

## Hook call with parameters

```php
Hook::exec('actionValidateCustomerAddressForm', ['form' => $this])) !== '') {
            $is_valid &= (bool) $hookReturn;
        }

        return $is_valid && parent::validate();
    }

    public function submit()
    {
        if (!$this->validate()) {
            return false;
        }

        $address = new Address(
            Tools::getValue('id_address'),
            $this->language->id
        );

        foreach ($this->formFields as $formField) {
            $address->{$formField->getName()} = $formField->getValue();
        }

        if (!isset($this->formFields['id_state'])) {
            $address->id_state = 0;
        }

        if (empty($address->alias)) {
            $address->alias = $this->translator->trans('My Address', [], 'Shop.Theme.Checkout');
        }

        Hook::exec('actionSubmitCustomerAddressForm', ['address' => &$address]);

        $this->setAddress($address);

        return $this->getPersister()->save(
            $address,
            $this->getValue('token')
        );
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return CustomerAddressPersister
     */
    protected function getPersister()
    {
        return $this->persister;
    }

    protected function setAddress(Address $address)
    {
        $this->address = $address;
    }

    public function getTemplateVariables()
    {
        $context = Context::getContext();

        if (!$this->formFields) {
            // This is usually done by fillWith but the form may be
            // rendered before fillWith is called.
            // I don't want to assign formFields in the constructor
            // because it accesses the DB and a constructor should not
            // have side effects.
            $this->formFields = $this->formatter->getFormat();
        }

        $this->setValue('token', $this->persister->getToken());
        $formFields = array_map(
            function (FormField $item) {
                return $item->toArray();
            },
            $this->formFields
        );

        if (empty($formFields['firstname']['value'])) {
            $formFields['firstname']['value'] = $context->customer->firstname;
        }

        if (empty($formFields['lastname']['value'])) {
            $formFields['lastname']['value'] = $context->customer->lastname;
        }

        return [
            'id_address' => (isset($this->address->id)) ? $this->address->id : 0,
            'action' => $this->action,
            'errors' => $this->getErrors(),
```