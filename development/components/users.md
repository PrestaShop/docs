---
title: Users
menuTitle: Users
---

# Users

## Authentication

Three types of users can be authenticated on PrestaShop:
- Front-Office browser users
- Back-Office browser users
- API consumers

Front-Office users and Back office users have access to a login form, where they must input email and password.

API consumers are authenticated using an [API key][webservice-key].

## Login

Upon successfull verification of email and password, browser users are logged in through the creation of a Cookie in `Context::updateCustomer()`.

Multiple hooks allow modules to interact with the authentication process, at different steps. Examples: `actionAuthenticationBefore`, `actionAuthentication` ...

{{% notice warning %}}
There is no persistent server-side sessions in PrestaShop, only the Cookie carries the authentication status.
{{% /notice %}}

## Permissions

Front-Office users have all the same level of authorization, which grants them access to their My Account area on the Front-Office.

Back-Office users permissions can be customized from the Back-Office to allow different kind of accesses.

### User secure key

Sometimes, it is necessary to be able to identify a browser user without logging. The User property `secure_key` serves this purpose. It is, for example, used to secure the "reset password" link sent by email when user has forgotten its password.

This `secure_key` property is stored in the User SQL table and in the user Carts data.

{{% notice warning %}}
If your module needs to be able to authenticate users without using login and password, please do not use the secure_key but your own identification token. The secure_key must remain a data internal to PrestaShop. Consider it a private key, not to be shared, but that can be used to validate a public key.
{{% /notice %}}

[webservice-key]: {{< ref "/8/webservice/tutorials/creating-access.md" >}}
