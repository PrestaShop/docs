---
title: Scale
weight: 8
pre: "<b>8. </b>"
chapter: true
---

### Chapter 7

# How to make PrestaShop scale

Scaling your PrestaShop instalation is something we hope every merchant will need, because it means their business is growing.

Hopefully, there are plenty of advices in these pages that will help.

## Scalings

Before doing anything to your PrestaShop setup, there are several things you need to know.

First, be aware that there are several ways to scale any application, PrestaShop incuded.

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
