---
title: Installing PrestaShop with Docker + PrestaShop Flashlight
menuTitle: Docker (Flashlight)
weight: 3
useMermaid: true
---

# Installing PrestaShop with Docker + PrestaShop Flashlight

PrestaShop Flashlight was made to be able to start a PrestaShop instance within seconds. 

It comes with default / demo content, Back Office access, and tools in the containers and in the Docker Compose manifest to run: 

- `PhpMyAdmin` (administration of MySQL over a web interface)
- `Composer` (dependency manager for PHP)
- `php-cs-fixer` (tool to apply code standards to your code)
- `phpstan` (PHP STatic ANalysis tool)
- `phpunit` (a PHP Testing Framework)

<div class='mermaid'>
timeline
  Setup environment
    : Install Docker
    : Clone Flashlight repository    
  Install PrestaShop
    : Start Docker Compose stack
  Use / develop on PrestaShop
    : You are ready to go
</div>

{{% notice warning %}}
This installation method is not for production and should not be exposed to public traffic over the internet,
please use it locally only, or at your own risks.

Are you looking for production-grade images? 
{{<cta relref="/8/basics/installation/environments/docker" type="primary">}}
  Install PrestaShop with Docker
{{</cta>}}

{{% /notice %}}

## Install prerequisites

Follow this guide: [Install PrestaShop with Docker]({{<relref "/8/basics/installation/environments/docker">}}) at steps: 

- Install Docker
- Install Docker Compose

## Run PrestaShop with Docker + PrestaShop Flashlight

1. [Clone the git repository: https://github.com/PrestaShop/prestashop-flashlight](https://github.com/PrestaShop/prestashop-flashlight)

```bash
git clone git@github.com:PrestaShop/prestashop-flashlight.git
```

2. Follow an example from the list provided in the repository: [Examples](https://github.com/PrestaShop/prestashop-flashlight/tree/main/examples)

| Example | Description |
| --- | --- |
| [auto-install-modules](https://github.com/PrestaShop/prestashop-flashlight/tree/main/examples/auto-install-modules) | This example demonstates how to automatically install modules at startup |
| [basic-example](https://github.com/PrestaShop/prestashop-flashlight/tree/main/examples/basic-example) | This example runs the latest available image of PrestaShop Flashlight |
| [develop-a-module](https://github.com/PrestaShop/prestashop-flashlight/tree/main/examples/develop-a-module) | This example demonstrates how to develop modules and mount them on your PrestaShop Flashlight instance |
| [develop-prestashop](https://github.com/PrestaShop/prestashop-flashlight/tree/main/examples/develop-prestashop) | This example runs a development of PrestaShop that can help to contribute to the project |
| [ngrok-tunnel](https://github.com/PrestaShop/prestashop-flashlight/tree/main/examples/ngrok-tunnel) | This example runs an ngrok tunnel to expose a local environment to the Web |
| [with-init-scripts](https://github.com/PrestaShop/prestashop-flashlight/tree/main/examples/with-init-scripts) | This example runs custom init scripts before initialization of PrestaShop |
| [with-post-scripts](https://github.com/PrestaShop/prestashop-flashlight/tree/main/examples/with-post-scripts) | This example runs custom scripts after initialization of PrestaShop |

3. Start the stack

```bash
docker compose up
```

Wait a few seconds, and your instance is ready to be tested / accessed at `http://localhost:8000`.

| Access / credentials Memo | |
| --- | --- |
| Front office default URL | http://localhost:8000 |
| Back office default URL | http://localhost:8000/admin-dev |
| Back office default email | admin@prestashop.com |
| Back office default password | prestashop |

## Examples and environment variables reference

A complete list of environment variables available for tuning the instance, and a few examples are available in the Github repository:  https://github.com/PrestaShop/prestashop-flashlight