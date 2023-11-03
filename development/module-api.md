---
title: Module Distribution API
weight: 80
---

# Module Distribution API

PrestaShop comes with some native modules managed by Composer package manager.
The source code of these modules is hosted on the GitHub PrestaShop organization.

When a new release of one of these modules is published, PrestaShop does not use Composer to allow users to upgrade the to a higher version. It uses the [Distribution API][github-repo-api].

From the back-office, shop administrators can install, uninstall and upgrade modules. For the modules managed by the PrestaShop organization, this API
- informs the back-office about modules that can be installed
- informs the back-office, for modules already installed, about new versions available

## About the API

This API provides:

- The list of all PrestaShop releases with name, download link, and PHP compatibility information (min, max)
- For each PrestaShop version, a list of modules with module information (name, latest compatible module version for this PrestaShop version) and download link for each project module

The above data is provided as JSON documents.

The API also manages the download links of PrestaShop releases and modules.

### Where does the data of the API comes from

Every hour the data of the API is refreshed. The API parses all of the GitHub releases data to find out

- all existing Core versions
- all existing module versions and compute their compatibility range with the Core

For example, if a version 7.0.1 of module Blockreassurance is released at 6:47PM, then the Distribution API will acknowledge this new version at 7PM.

Using the parsed GitHub data, the API computes the information it must provide and output them into persisted JSON documents. This is the files that PrestaShop instances can fetch to find the data they need.

### More informations about the API

The [README][github-repo-api] of the API explains in details how the API can be used, how it is run and hosted.

## In the Back-office

PrestaShop embeds the [Distribution API Client][github-repo-client] module that allows it to connect to Distribution API. It is a simple gateway.

Removing the module would sever the link to PrestaShop Distribution API, however users can also replace the module by another one that would provide an equivalent service. This effectively allows users to create their own Distribution API (if for example they wish to also manage their own modules lifecycle by a custom API).

The module is mostly used by the back-office page "Module Manager" where shop administrator can install, uninstall and upgrade modules. PrestaShop back-office does rely on the module (that does connect to the Distribution API) to fetch the needed data to power the page.

[github-repo-api]: https://github.com/PrestaShop/distribution-api
[github-repo-client]: https://github.com/PrestaShop/ps_distributionapiclient
