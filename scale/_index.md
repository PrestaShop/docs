---
title: Scale
weight: 8
pre: "<b>8. </b>"
chapter: true
showOnHomepage: true
icon: fa-rocket
---

### Chapter 8

# How to make PrestaShop scale

Scaling your PrestaShop installation is something we hope every merchant will need, because it means their business is growing.

Hopefully, there are plenty of advices in these pages that will help.

## Scalings

Before doing anything to your PrestaShop setup, there are several things you need to know.

First, be aware that there are several ways to scale any application, PrestaShop included.

### Vertical scaling

The most used one is called vertical scaling, where you boost your server's performance : you add some RAM, some CPU, increase the disks IOs performances, and so on. It can be quick and easy if your hoster allows it and does not require any change in your application setup and configuration.

However, this method is not the most efficient one, as doubling the server's resources will not necessarily double its oberved performances.

In addition, the monetary cost of vertical scaling may not be linear. Depending on your hosting company, your mileage may vary.

In some cases, doubling your server capacity _may_ cost you more than twice its original price.

### Horizontal scaling

Generally, the most efficient way to scale an application's performance remains adding more servers.

It may not be as simple as it sounds, as PrestaShop requires many files being shared (or at least synchronized) across the instances, but it's not that hard when you have figured it out.

Also, once you have set up your first server, setting additional ones should be far easier.

The good thing is that, though requiring more sweat at first, horizontal scaling is better in terms of performances. Done well, adding a second server may easily double your application performance, if not more.

### Further than LAMP

Another way to scale your shop is to introduce other systems to improve your performances. Here is a quicklist of what can be used:

1. Using a HTTP accelerator such as Varnish for Front Office
2. Using an in-memory data structure store such as Redis to store sessions
3. Use Elasticsearch or a solution built on it for processing customer searches
4. Use a Content Delivery Network (CDN) for static files

Note: services like a CDN or HTTP accelerator are useful in a production environment, not in a development environment.

## In this section

{{% children /%}}
