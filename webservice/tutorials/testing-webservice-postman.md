---
title: Testing the Webservice with Postman
menuTitle: Testing with Postman
weight: 3
---

# Testing the Webservice with Postman

Postman is a powerful collaboration platform that simplifies the process of developing, testing, documenting, and sharing APIs (Application Programming Interfaces) by providing a user-friendly interface and a comprehensive set of tools.

Some example collections of Postman requests on PrestaShop Webservice are [available on our repository](https://github.com/PrestaShop/webservice-postman-examples). 

## Install Postman

Postman is available on Linux, MacOS and Windows. Please [follow instructions here](https://learning.postman.com/docs/getting-started/installation-and-updates/).

## How to use these examples

### Clone the repository

First, clone the example repository locally: 

```shell
git clone git@github.com:PrestaShop/webservice-postman-examples.git
```

### Import a collection

Open Postman, and choose "File > Import". Then navigate to the cloned repository, and import a `JSON` collection.

The collection will be available in the sidebar:

![Postman sidebar](../assets/postman01.png)

### Set the Webservice URL and authorization key

Click on the collection title (`PrestaShop Webservice Demo Resource`), and navigate in the `Variables` tab:

![Postman sidebar](../assets/postman02.png)

- Overwrite the `webservice_key` with your webservice key (set value in the `CURRENT VALUE` cell).
- Overwrite the `webservice_url` with your PrestaShop instance url (set value in the `CURRENT VALUE` cell).

### Run examples

Confirm the connection with the Webservice is working properly by running a request: 

![Postman sidebar](../assets/postman03.png)

Select a request, and click on the `Send` button.

## Product resource examples (demo_product_collection.json)

This collection shows all CRUD actions on the Product resource:

- List Products (`GET`)
- Get Product (`GET`)
- Create Product (`POST`)
- Update Product (`PUT` and `PATCH`)
- Delete Product (`DELETE`)

## Create a product from start to finish with Webservices (demo_product_creation_AZ.json)

This collection illustrates how to create a product from A to Z with all of its relations (to Brand, Category, Manufacturer, Images, etc.)

## Article resource examples (demo_custom_resource_collection.json)

This collection is related to the tutorial: [How to extend the Webservice with a custom resource]({{< relref "/8/modules/concepts/webservice/">}})