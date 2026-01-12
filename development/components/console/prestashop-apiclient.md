---
title: prestashop:api-client
category: API & Documentation
description: Manage API client credentials
weight: 10
---

# `prestashop:api-client`

## Informations

* Path: `src/PrestaShopBundle/Command/APIClientCommand.php`
* Arguments:
  * `action`: Action to perform, create/delete.
  * `client-id`: Client ID.
* Options:
  * `--name`: Client Name
  * `--description`: Client Description (Created by CLI command., by default)
  * `--all-scopes`: Automatically assign all available scopes
  * `--scopes`: OClient list of scopes separated by commas
  * `--secret-only`: Only output secret value after creation
  * `--timeout`: Timeout in seconds (3600, by default)
  * `--secret`: Force secret value (auto generated, by default)

## Description

Manage Admin API client.

## Usage

Create an AdminApi client.

```bash
bin/console prestashop:api-client create DevDocs
```

Create an AdminApi client with custom description.

```bash
bin/console prestashop:api-client create DevDocs --description="Made by DevDocs"
```
```

Create an AdminApi client and display only secret.

```bash
bin/console prestashop:api-client create DevDocs --secret-only
```

Delete an AdminApi client.

```bash
bin/console prestashop:api-client delete DevDocs
```
