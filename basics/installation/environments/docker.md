---
title: Installing PrestaShop with Docker
menuTitle: Docker environment
weight: 2
useMermaid: true
---

# Installing PrestaShop with Docker

PrestaShop is available through Docker for testing/experimenting and developing modules or themes. 

Docker is an open-source platform that enables developers to package applications and their dependencies into lightweight, portable containers. It provides an efficient and consistent way to build, ship, and run software across different environments.

- [Docker's website](https://www.docker.com/)
- [PrestaShop's Docker Github repository](https://github.com/PrestaShop/docker)
- [PrestaShop's Docker Hub](https://hub.docker.com/r/prestashop/prestashop/)

The easiest way to begin with PrestaShop on Docker is to run your stack with Docker Compose. It will ease container management, networks, and volume persistence.

<div class='mermaid'>
timeline
  Setup environment: Install Docker
  Prepare PrestaShop installation
    : Create Docker Compose Manifest
    : Start Docker Compose stack
  Install PrestaShop
    : Automatically installed (or manually)
  Use PrestaShop
    : You are ready to go
</div>

{{% notice note %}}
Looking for a quicker way to test and develop on PrestaShop?

{{<cta relref="/8/basics/installation/advanced/prestashop-flashlight" type="primary">}}
  Install PrestaShop locally with Docker and PrestaShop Flashlight
{{</cta>}}
{{% /notice %}}
## Install Docker

Docker is available on each major operating system. [You will need to install Docker](https://docs.docker.com/get-docker/).

{{% notice note %}}
When using Windows (10+), it can be a good solution to [install WSL (Windows Subsystem for Linux)](https://learn.microsoft.com/en-gb/windows/wsl/install), and then install Docker on the WSL distribution. You will benefit from all the advantages of a Linux OS when using Shell / CLI.
Note: WSL2 should be a better option when running Docker.
{{% /notice %}}

### Install docker compose

Docker Compose is a tool that simplifies the management of multi-container Docker applications by allowing developers to define and configure complex application stacks using a declarative YAML file, enabling easy orchestration, scaling, and networking of containers with a single command.

Docker Compose is included in versions of Docker Desktop (Windows, Mac). If you are using Docker on Linux, [you must install docker compose](https://docs.docker.com/compose/install/). 

## Use Docker Compose to manage your stack

Docker Compose will help start and stop your PrestaShop stack, persist your database with a volume, persist your installation, and will allow you to mount local modules and/or themes in PrestaShop. 

PrestaShop provides two options when it comes to running it with Docker:

- Production ready images with minimal tooling.
- Development and testing friendly images with tooling: PrestaShop Flashlight.

### Create the docker-compose.yml manifest

```yaml
services:
  mysql:
    container_name: some-mysql
    image: mysql:5.7
    restart: unless-stopped
    environment:
      MYSQL_ROOT_PASSWORD: admin
      MYSQL_DATABASE: prestashop
    networks:
      - prestashop_network
  prestashop:
    container_name: prestashop
    image: prestashop/prestashop:latest # Latest stable version of the PrestaShop, to see all available images go to ...
    restart: unless-stopped
    depends_on:
      - mysql
    ports:
      - 8080:80
    environment:
      DB_SERVER: some-mysql
      DB_NAME: prestashop
      DB_USER: root
      DB_PASSWD: admin
    networks:
      - prestashop_network
networks:
    prestashop_network:
```

{{% notice info %}}
When using an M1-chip Mac, you may need to add: `platform: linux/x86_64` on each container declaration. 
{{% /notice %}}

### Automatically install PrestaShop with test data

{{% notice note %}}
This is the easiest and quickest way to start and test PrestaShop with Docker.
{{% /notice %}}

You can automatically install PrestaShop (and add test data) without having to use the installation assistant when creating your Docker Compose stack. 

To achieve this, you need to set those environment variables in your PrestaShop container declaration in your  `docker-compose.yml` file:

```yaml
PS_INSTALL_AUTO: 1
PS_DOMAIN: localhost:8080
```

Then run `docker compose up` in your terminal, wait a few minutes, and you will be able to access a PrestaShop instance on `http://localhost:8080` with the front office containing the demo products and `http://localhost:8080/admin` for the back office.

Complete docker-compose.yml manifest for reference:

```yaml
services:
  mysql:
    container_name: some-mysql
    image: mysql:5.7
    restart: unless-stopped
    environment:
      MYSQL_ROOT_PASSWORD: admin
      MYSQL_DATABASE: prestashop
    networks:
      - prestashop_network
  prestashop:
    container_name: prestashop
    image: prestashop/prestashop:latest
    restart: unless-stopped
    depends_on:
      - mysql
    ports:
      - 8080:80
    environment:
      DB_SERVER: some-mysql
      DB_NAME: prestashop
      DB_USER: root
      DB_PASSWD: admin
      PS_INSTALL_AUTO: 1
      PS_DOMAIN: localhost:8080
    networks:
      - prestashop_network
networks:
    prestashop_network:
```

### Manually install PrestaShop with Installation Assistant, and begin testing

To manually install PrestaShop using the Installation Assistant, don't set the environment variables `PS_DEMO_MODE` and `PS_INSTALL_AUTO`.

In the directory where the docker compose.yml file is located, do the following: 

- Start the stack: `docker compose up`

Access `http://localhost:8080` on your browser to begin testing PrestaShop. 

You will land on the installer of PrestaShop. 

- When asked for a MySQL server, type `some-mysql`, as declared in your yaml file.
- When asked for MySQL user, use `root`, as declared in your yaml file.
- When asked for MySQL password, use `admin`, as declared in your yaml file.


Stop the stack by closing your terminal, or hit `ctrl + c`.

{{% notice info %}}
To keep your instance running in background, run `docker compose up -d`

To stop it, run `docker compose down`
{{% /notice %}}

#### Installation assistant and admin URLs

{{% notice note %}}
It is a good practice to change `install/` and `admin/` directory names. 

To achieve this, specify the two following environment variables in your PrestaShop container declaration:

```
PS_FOLDER_ADMIN: admin4577
PS_FOLDER_INSTALL: install4577
```

In this example, we set them to `admin4577` and `install4577`. When installing PrestaShop with Docker for the first time, you need to access `https://localhost:8080/install4577`.
{{% /notice %}}

{{% notice info %}}
If you did not change the `install/` or `admin/` directory names, after installation, you need to manually delete the install directory in your container, and change the admin directory name. 
To do this, please run: 

```
docker exec -i prestashop rm -rf install
docker exec -i prestashop mv admin admin_xxx
```
After running these scripts, your back office will be at `https://localhost:8080/admin_xxx`. 
{{% /notice %}}

### Bind a volume for MySQL persisting

If you don't bind a volume to the MySQL container, the database content will not be persisted when stopping/restarting the stack.

To avoid this, add a `volume` to your MySQL container: 

```yml
...
  mysql:
    container_name: some-mysql
    volumes:
      - dbdata:/var/lib/mysql
...
volumes:
  dbdata:
```

### Bind a volume for instance persisting

If you don't bind a volume to the PrestaShop container, data will not be persisted when stopping / restarting the stack. PrestaShop will try to install itself at every restart of the stack.

To avoid this, add a `volume` to your PrestaShop container: 

```yml
...
  prestashop:
    container_name: prestashop
    ...
    volumes:
      - psdata:/var/www/html
...
volumes:
  psdata:
```

### Bind a local module to your instance in your manifest

Let's consider we have a `test_module` PrestaShop Module. 

Create a `modules/` directory, and drop in your `test_module` directory.

Create a bind mount in your docker-compose.yml:

```yaml
...
  prestashop:
    container_name: prestashop
    ...
    volumes:
      - type: bind
        source: ./modules/test_module # local path to the module
        target: /var/www/html/modules/test_module # path to be mounted in the container
...
```

And that's it: your module is available on the `prestashop` Docker container, and changes made in the local directory of the module are automatically synchronized on the `prestashop` Docker container. 

### Bind a local theme to your instance in your manifest

Let's consider we have a `mytheme` PrestaShop Theme. 

Create a `themes/` directory, and drop your `mytheme` directory there.

Create a bind mount in your docker-compose.yml:

```yaml
...
  prestashop:
    container_name: prestashop
    ...
    volumes:
      - type: bind
        source: ./themes/mytheme # local path to the module
        target: /var/www/html/themes/mytheme # path to be mounted in the container
...
```

And that's it: your theme is available on the `prestashop` Docker container, and changes made in the local directory of the theme are automatically synchronized on the `prestashop` Docker container. 

### Complete docker-compose.yml for reference

```yaml
services:
  mysql:
    container_name: some-mysql
    image: mysql:5.7
    restart: unless-stopped
    environment:
      MYSQL_ROOT_PASSWORD: admin
      MYSQL_DATABASE: prestashop
    networks:
      - prestashop_network
    volumes:
      - dbdata:/var/lib/mysql
  prestashop:
    container_name: prestashop
    image: prestashop/prestashop:latest
    restart: unless-stopped
    depends_on:
      - mysql
    ports:
      - 8080:80
    environment:
      DB_SERVER: some-mysql
      DB_NAME: prestashop
      DB_USER: root
      DB_PASSWD: admin
      PS_FOLDER_ADMIN: admin4577
      PS_FOLDER_INSTALL: install4577
    networks:
      - prestashop_network
    volumes:
      - type: bind
        source: ./modules/testModule # local path to the module
        target: /var/www/html/modules/testModule # path to be mounted in the container
      - type: bind
        source: ./themes/myTheme # local path to the theme
        target:  /var/www/html/themes/myTheme # path to be mounted in the container
      - psdata:/var/www/html
networks:
  prestashop_network:
volumes:
  psdata:
  dbdata:
```

### Add PHPMyAdmin to your stack

In the docker-compose.yml, add the following service declaration:

```yml
services:
...
    phpmyadmin:
      image: phpmyadmin/phpmyadmin
      container_name: phpmyadmin
      links:
        - mysql
      environment:
        PMA_HOST: some-mysql
        PMA_PORT: 3306
        PMA_ARBITRARY: 1
        PMA_USER: root
        PMA_PASSWORD: admin
      restart: unless-stopped
      ports:
        - 8081:80
      networks:
        - prestashop_network
```

And access `http://localhost:8081` to access `phpMyAdmin`.

### Enter the container to execute commands and interact with all its files

Sometimes, you may need to enter the container to parse logs, execute commands, modify core files, or some of the environment configurations.

To access the container's shell, simply execute the following command in your terminal:

```bash
docker exec -ti prestashop /bin/bash
```

You will land in the container, in the PrestaShop's directory (`/var/www/html`).

From there, you can use commands like:

```bash
php bin/console prestashop:module enable xxx # enables the module xxx
tail -f var/logs/dev.log # tail in interactive mode the dev.log file
# you can use all other commands you may need
```

You can also execute commands directly in the container with `docker exec -i`: 

```bash
docker exec -i prestashop php bin/console list # will execute list command from Symfony's console 
```

## Run PrestaShop on Docker without Docker Compose

PrestaShop runs on an *AMP stack (Apache - MySQL - PHP). Two containers are required to run PrestaShop: 

- a MySQL container (5.7 version)
- a PrestaShop container (packaging PHP, PHP modules and extensions, PrestaShop codebase and dependencies)

{{% notice note %}}
The default images (`prestashop/prestashop:latest`, `prestashop/prestashop:version` or `prestashop/prestashop:version-apache`) uses `php:phpversion-apache` as a base, which means they embed a Webserver (`Apache`). 

If you use `prestashop/prestashop:version-fpm` versions, you will need to run a dedicated Webserver to expose your instance.
{{% /notice %}}

### Create a Docker network

Those two containers need to be able to communicate with each other. 

```
$ docker network create prestashop-net
```

{{% notice note %}}
When using Docker Compose, the network lives and dies when starting/stopping the stack automatically.
{{% /notice %}}

### Start a MySQL 5.7 container

Then, start a MySQL container:

- with image `mysql:5.7`, 
- with network `prestashop-net`, 
- with container name `some-mysql`, 
- and `root password` 'admin'. 

```
$ docker run -ti --name some-mysql --network prestashop-net -e MYSQL_ROOT_PASSWORD=admin -d mysql:5.7
```

### Start the PrestaShop container

Then, start the PrestaShop container: 

- with `name` `some-prestashop`, 
- with `network` `prestashop-net`,
- on exposed `port` `8080`
- with `image` `prestashop/prestashop:latest`

```
$ docker run -ti --name some-prestashop --network prestashop-net -p 8080:80 -d prestashop/prestashop:latest
```

## Images, architectures and tags

All our images and tags are available on [Docker Hub](https://hub.docker.com/r/prestashop/prestashop).

### Use a specific PrestaShop version

You can use a specific PrestaShop version by changing the image tag: 

- Use latest image: `prestashop/prestashop:latest`
- Use 1.7: `prestashop/prestashop:1.7`
- Use 1.7.8: `prestashop/prestashop:1.7.8`

### Use a specific PHP version

You can also specify the version of PHP to use:

- Use 8.0.4 image, with PHP 8.1: `prestashop/prestashop:8.0.4-8.1`
- Use 8.0 image, with PHP 7.4: `prestashop/prestashop:8.0-7.4`

### Use Apache or FPM

You can also specify to use Apache or FPM by appending `-apache` or `-fpm` to the image. 

- Use 8.0.4 image, with PHP 8.1, on Apache: `prestashop/prestashop:8.0.4-8.1-apache`
- Use 8.0.4 image, with PHP 8.1, with PHP-FPM: `prestashop/prestashop:8.0.4-8.1-fpm`

{{% notice note %}}
The default images (`prestashop/prestashop:latest`, `prestashop/prestashop:version` or `prestashop/prestashop:version-apache`) uses `php:phpversion-apache` as a base, which means they embed a Webserver (`Apache`). 

If you use `prestashop/prestashop:version-fpm` versions, you will need to run a dedicated Webserver to expose your instance.
{{% /notice %}}

## Environment variables reference

Several environment variables are available on the PrestaShop Docker image, to customize/setup your instance:

| Environment variable  | Description | Default value |
|---|---|---|
| PS_DEV_MODE | The constant _PS_MODE_DEV_ will be set at true | `0` |
| PS_HOST_MODE | The constant _PS_HOST_MODE_ will be set at true. Useful to simulate a PrestaShop Cloud environment. | `0` |
| PS_DEMO_MODE | The constant _PS_DEMO_MODE_ will be set at true. Use it to create a demonstration shop. | `0` |
| DB_SERVER | If set, the external MySQL database will be used instead of the volatile internal one | `localhost` |
| DB_USER | Override default MySQL user | `root` |
| DB_PASSWD | Override default MySQL password | `admin` |
| DB_PREFIX | Override default tables prefix | `ps_` |
| DB_NAME | Override default database name | `prestashop` |
| PS_INSTALL_AUTO | The installation will be executed. Useful to initialize your image faster. In some configurations, you may need to set PS_DOMAIN or PS_HANDLE_DYNAMIC_DOMAIN as well. (Please note that PrestaShop can be installed automatically from PS 1.5) | `0` |
| PS_ERASE_DB | Drop the mysql database. All previous mysql data will be lost | `0` |
| PS_INSTALL_DB | Create the mysql database. | `0` |
| PS_DOMAIN | When installing automatically your shop, you can tell the shop how it will be reached. For advanced users only | |
| PS_LANGUAGE | Change the default language installed with PrestaShop | `en` |
| PS_COUNTRY | Change the default country installed with PrestaShop | `GB` |
| PS_ALL_LANGUAGES | Install all the existing languages for the current version. | `0` |
| PS_FOLDER_ADMIN | Change the name of the admin folder | `admin` |
| PS_FOLDER_INSTALL | Change the name of the install folder | `install` |
| PS_ENABLE_SSL | Enable SSL at PrestaShop installation. | `0` |
| ADMIN_MAIL | Override default admin email | `demo@prestashop.com` |
| ADMIN_PASSWD | Override default admin password | `prestashop_demo` |

If your IP / port (or domain) change between two executions of your container, you will need to modify this option:

| Environment variable  | Description | Default value |
|---|---|---|
| PS_HANDLE_DYNAMIC_DOMAIN | Add specific configuration to handle dynamic domain | `0` |

## Troubleshooting 

If you encounter issues using PrestaShop with Docker, feel free to read our troubleshooting tips on [PrestaShop's Docker Github repository](https://github.com/PrestaShop/docker) or [open an issue](https://github.com/PrestaShop/docker/issues) if the problem is not already addressed.

### Allow your instance to be accessible through internet

Some native PrestaShop modules must be accessible online to work correctly (`ps_accounts`, `ps_billing`, `ps_eventbus`, `ps_metrics`, ...). 

To make your instance accessible through the Internet, you can use solutions such as `ngrok`, [as shown here](https://github.com/PrestaShopCorp/docker-compose-kickstarter).
