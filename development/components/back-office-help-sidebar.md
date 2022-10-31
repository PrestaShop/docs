---
title: Back Office Help sidebar
---

# The Back Office Help sidebar

Back Office controller returns Back Office HTML pages.

Most of these Back Office pages have a common HTML structure:
- a layout at the top
- a menu navigation bar on the left
- the page content at the center
- a collapsable right sidebar that contains documentation 

## About the help sidebar content

When the BO user clicks on the 'Help' button, the sidebar opens and displays the related Documentation page for the Back Office page that the user browses.

This documentation page comes from help.prestashop.com which is a gateway that returns the content of docs.prestashop-project.org in the right format to be inserted into the Back Office.

## How it is built for modern controllers

The sidebar contains an HTML [object](https://www.w3schools.com/tags/tag_object.asp) (similar to iframe). When help.prestashop.com is fetched, the returned content is an HTML document fetched from help.prestashop.com by [`.load`](https://api.jquery.com/load/).

Fetch is performed to URL with this structure:

`help.prestashop.com/<language code>/doc/<help context>?version=<version number>`

| Element            | Description
|--------------------|-----------------------------------------------------------------------
| `<language code>`  | ISO 639-1 language code (2 letters, lower case)
| `<help context>`   | The controller name for which help is requested
| `<version number>` | Version number of current PrestaShop app calling for contextual help.

Example: https://help.prestashop.com/fr/doc/AdminProducts?version=1.7.1.2

## How it is built for legacy controllers

The sidebar has an empty container. When help.prestashop.com is fetched, the returned content is JavaScript that fills the empty container with content.

Fetch is performed to URL with this structure:

`help.prestashop.com/api/?request=<url-encoded query string>`

| Element            | Description
|--------------------|-----------------------------------------------------------------------
| `<version number>` | Version number of current PrestaShop app calling for contextual help.
| `<language code>`  | ISO 639-1 language code (2 letters, lower case)

Example: https://help.prestashop.local/api/?request=getHelp%3DAdminProducts%26version%3D1.7.1.2%26language%3Dfr
