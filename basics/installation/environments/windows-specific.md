---
title: Installing an AMP stack on Windows
menuTitle: Windows environment
weight: 3
---

# Installing an AMP stack on Windows

PrestaShop is an Open-Source web application running on an *AMP stack (Apache - MySQL - PHP).

In order for PrestaShop to run locally on your Windows computer, you need to install an *AMP stack. 

Several options are available, such as: 

- [WAMP](https://www.wampserver.com/en/)
- [XAMPP](https://www.apachefriends.org/index.html)
- [EasyPHP](https://www.easyphp.org/easyphp-devserver.php)
- [MAMP](https://www.mamp.info/en/mamp/windows/)
- [Laragon](https://laragon.org/docs/)

## Important notes when using Windows shell (CLI)

Several examples in this documentation uses `CLI` (Command line interface), refered sometimes as `terminal`.

You may need to replace some commands in examples, for instance:

- When copying files, on `Unix` based operating systems (the ones we use in the docs), we use `cp`, on Windows you need to use `copy`.
- When moving files, on `Unix` based OS, we use `mv`, you need to use `move`. 
- When deleting files, we use `rm`, you need to use `del`. 

## Use WSL to run a AMP stack

A good option to install an AMP stack on your Windows, is to use [WSL (Windows Subsystem for Linux)](https://learn.microsoft.com/en-gb/windows/wsl/install).

`WSL` allows you to install a Linux distribution on your Windows, and leverage all Linux advantages when it comes to running a server, and it will help you understand how a web server works, making it easier when you will have to deploy your PrestaShop for production. 

When `WSL` is installed, install a distribution of your choice (`Ubuntu 22.x LTS` is a good choice since it is a Long Term Support (LTS) version, and it is widely used, so sources of support are numerous).

When installed, [use this tutorial to install the AMP stack](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-22-04). 

## Use Docker to run PrestaShop on Windows

Another good option when it comes to run PrestaShop on Windows, is to use `Docker`: [More informations on this dedicated page]({{< relref "8/basics/installation/environments/docker">}}).

{{<cta relref="/8/basics/installation" type="primary">}}
  Back to installation guide
{{</cta>}}