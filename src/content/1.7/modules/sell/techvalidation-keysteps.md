---
title: Technical validation - Key steps
weight: 2
---

# Technical Validation: key steps

Have you ever wondered how the PrestaShop Addons Team proceeds with the validation ?

We are going to show you how to spare time so that you can pretty much "validate" your own module before submitting it to the Addons Marketplace.
First you might want to read the [Technical Tools]({{< ref "technical-tools.md" >}}) and the [Good Practices]({{< ref "/1.7/modules/creation/good-practices" >}}). 

### 1. The Basics

As you probably know, there are 3 types of submissions : New, Minor update, Major update.
We do not handle them with the same standards:

- We are very strict and meticulous when it comes to New modules.
- For major updates, we have the exact same verifications that the New modules.
- For minor updates, we rely on the validator and we also have a Diff Tool to only see the modifications.

Let's now give you more details on how we handle them all.

### 2. Processing of New and Major updates

What is a "New" Module? 
Actually, it is a zip file. Your module is the product and since you can submit several zips per product, let's
use the right words.

Simple: the very first time you submit a zip for your module, it is called a "New" zip.
Please, do not try to submit your module if you have never used the [Validator](https://validator.prestashop.com/).
That tool runs several checks to make sure your module will run smoothly on PrestaShop. As the current version is
closed source, a [document](https://docs.google.com/document/d/1ti40qkdW0kKhSWTJX6lwH-485alLd21YX9VZnq-roZ8/edit?usp=sharing)
summarize the different checks made by it.

### 3. Review by the marketplace teams

After meeting each requirement provided by the Validator, here's a list of extra points we check: [Validation checklist]({{< ref "1.7/modules/sell/techvalidation-checklist" >}})
