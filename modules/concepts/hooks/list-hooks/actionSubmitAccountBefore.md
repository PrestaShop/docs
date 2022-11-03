---
menuTitle: actionSubmitAccountBefore
title: actionSubmitAccountBefore
hidden: true
files:
  - controllers/front/RegistrationController.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionSubmitAccountBefore

Located in :

  - controllers/front/RegistrationController.php

## Parameters

```php
Hook::exec('actionSubmitAccountBefore', [], null, true),
                function ($carry, $item) {
                    return $carry && $item;
                },
                true
            );

            // If no problem occured in the hook, let's get the user redirected
            if ($hookResult && $register_form->submit() && !$this->ajax) {
                // First option - redirect the customer to desired URL specified in 'back' parameter
                // Before that, we need to check if 'back' is legit URL that is on OUR domain, with the right protocol
                $back = rawurldecode(Tools::getValue('back'));
                if (Tools::urlBelongsToShop($back)) {
                    return $this->redirectWithNotifications($back);
                }

                // Second option - we will redirect him to authRedirection if set
                if ($this->authRedirection) {
                    return $this->redirectWithNotifications($this->authRedirection);
                }

                // Third option - we will redirect him to home URL
                return $this->redirectWithNotifications(__PS_BASE_URI__);
            }
        }

        $this->context->smarty->assign([
            'register_form' => $register_form->getProxy(),
            'hook_create_account_top' => Hook::exec('displayCustomerAccountFormTop'),
        ]);
        $this->setTemplate('customer/registration');

        parent::initContent();
    }

    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();

        $breadcrumb['links'][] = [
            'title' => $this->trans('Create an account', [], 'Shop.Theme.Customeraccount'),
            'url' => $this->context->link->getPageLink('registration'),
```