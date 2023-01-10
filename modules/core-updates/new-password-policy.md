---
title: New password policy based on zxcvbn
menuTitle: New password policy
---

# New password policy introduced in 8.0.x

A new password policy was introduced in 8.0.x for Customers and Employees passwords.

This password policy is based on `Zxcvbn`.

{{% notice note %}}
`Zxcvbn` is a password strength estimation library that is designed to help developers create secure password policies for their applications. It was developed by DropBox and [is available as an open-source library](https://github.com/dropbox/zxcvbn). 

It estimates the strength of a password by analyzing various factors such as its length, the use of special characters, and the presence of common words or patterns. The goal of zxcvbn is to provide a more accurate and user-friendly way of assessing password strength compared to traditional approaches, which often rely on simple checks such as minimum length or the presence of certain types of characters.

To use `Zxcvbn`, you provide the password as input to the library and it returns an estimated strength score. The score is a number between 0 and 4, with higher numbers indicating stronger passwords. This score is then used to provide feedback to users on the strength of their chosen password.
{{% /notice %}}

When creating / updating a `Customer` account, or an `Employee` account, the `Zxcvnb` api is used to determine the score, and make an instant feedback using Javascript to the `User`:

![Password policy in back office for Employees](../img/password-policy-bo.png)

![Password policy in front office for Customers](../img/password-policy-fo.png)

## Changes introduced in PrestaShop by this new policy

This new password policy introduced some backward compatibility breaks:

* File `jquery-passy.js` is no longer available
* Form field `change-password` is no longer working as it was for [passy](https://timseverien.github.io/passy/) integration
* The password now requires a correct length whatever is it the Front or the Back Office
* `AddEmployeeCommand` now requires `hasEnabledGravatar`, `minLength`, `maxLength` and `minScore`
* `EditEmployeeCommand::setPlainPassword` now requires `minLength`, `maxLength` and `minScore`
* `Employee\ValueObject::Password` now requires `minLength`, `maxLength` and `minScore`
* `Employee/EmployeeType` now requires an instance of `ConfigurationInterface`
* `ChangePasswordType`  now requires an instance of `ConfigurationInterface`
* `Core/Domain/Employee/ValueObject/Password::MIN_LENGTH` and `Core/Domain/Employee/ValueObject/Password::MAX_LENGTH` are no longer available
* `Employee\ValueObject\Password::__construct` signature changed to `string $password, int $minLength, int $maxLength, int $minScore`
* `PrestaShopBundle/Form/Admin/Type/ChangePasswordType::__construct` now require a `ConfigurationInterface`

And some deprecations: 

* `Validate::isPlaintextPassword` is deprecated
* `Validate::isPasswdAdmin` is deprecated

{{% notice note %}}
Please note that the library is loaded asyncronously in `core.js` because of its size. 
{{% /notice %}}

## Upgrade guide for your module / theme

### How to update your code for backend development

If your module is creating / updating `Customers` or `Employees`, make sure to update your code according to the BC breaks and deprecations indicated above.

### How to update your frontend theme

If your theme is creating / updating `Customers` or `Employees`, make sure to update your code according to the BC breaks related to themes (`jquery-passy.js` no longer available, and form field `change-password` no longer working). 

If your theme is extending `PrestaShop/classic-theme`, 

- make sure your modifications (if any) to `template/customer/_partials/customer-form.tpl` does not change the `div` added around `password fields`:

```
<div class="field-password-policy">
    {form_field field=$field}
</div>
```

- make sure your modifications on your theme does not alter the requirement of `_partials/password-policy-template.tpl` in the Javascripts includes. 

- make sure your modifications on your theme does not alter the `templates/_partials/form-fields.tpl` file on the password field, [please refer here for requirements](https://github.com/PrestaShop/classic-theme/pull/21/files#diff-2b3eb6586609ac820d08cd566e45c06c2dd477060b2ffadeda1fb1d2941d69b7).