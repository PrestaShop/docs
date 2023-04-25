---
title: Upgrade FAQ
showOnHomepage: true
---

# Upgrade FAQ

- [After upgrading, I lost access to some Back-Office pages](#restore-access-to-back-office-page)
- [Upgrade fails with Error message JqXHR](#upgrade-fails-with-error-message-jqxhr)


## Restore access to Back Office Page

**Q:** After upgrading my PrestaShop to a new version, I lost access to some Back-Office pages. How can I fix it?

**A:** It is likely that some SQL configuration is not correct.

First, identify what is the `slug` of the Back Office pages. You can find them into the SQL table `ps_authorization_role`. This will tell you the SQL identifier for these pages.

Second, identify the _Role_ of the User you use to browse the Back Office.

Third, check whether the table `ps_access` grants access to the Back Office pages, using the identifier of the role and the identifiers of the Back Office pages. There must be a record for the role and the page. If there is no such record, create it to grant access.

## Upgrade fails with Error message JqXHR

If during upgrade process, it fails with the error message:

```
[Ajax/Server operation [...]] textStatus: "Error" errorThrown: "" JqXHR: "",
```

This error message indicates something went wrong on server side.

In order to find out what exactly went wrong, you need to check the upgrade process logs that are located into the folder `{Prestashop_Folder}/{Admin_folder}/autoupgrade/tmp/`
