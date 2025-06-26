---
title: prestashop:generate:apidoc
---

# `prestashop:generate:apidoc`

## Informations

* Path: `src/PrestaShopBundle/Command/GenerateAPIDocCommand.php`

## Description

Generate Admin API documentation in JSON.

Ouptput is write as it in console.

To write content into a specific file, give it as output path.

```bash
bin/console prestashop:generate:apidoc > admin-api/swagger-doc/openapi.json
```

{{% notice note %}}
This command is used to update the PrestaShop Developer Documentation in an automatic way.
{{% /notice %}}