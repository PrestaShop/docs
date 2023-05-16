---
title: Installing PrestaShop with Docker
menuTitle: Installation with Docker
weight: 15
---

# Installing PrestaShop with Docker

PrestaShop is available through Docker for testing/experimenting, and developping modules or themes. 

Docker is an open-source platform that enables developers to package applications and their dependencies into lightweight, portable containers, providing an efficient and consistent way to build, ship, and run software across different environments.

- [Docker's website](https://www.docker.com/)
- [PrestaShop's Docker Github repository](https://github.com/PrestaShop/docker)
- [PrestaShop's Docker Hub](https://hub.docker.com/r/prestashop/prestashop/)

## Install Docker

Docker is available on each major operating system. [You will need to install Docker](https://docs.docker.com/desktop/).

{{% notice note %}}
When using Windows (10+), it can be a good solution to [install WSL (Windows Subsystem for Linux)](https://learn.microsoft.com/en-gb/windows/wsl/install), and then install Docker on the WSL distribution. You will benefit of all the advantages of a Linux OS when using Shell / CLI.
{{% /notice %}}

### Install docker-compose

Docker Compose is a tool that simplifies the management of multi-container Docker applications by allowing developers to define and configure complex application stacks using a declarative YAML file, enabling easy orchestration, scaling, and networking of containers with a single command.

Docker-compose is included in versions of Docker Desktop (Windows, Mac). If you are using Docker on Linux, [you need to install docker-compose](https://docs.docker.com/compose/install/). 

## Run PrestaShop on Docker

PrestaShop runs on a *AMP stack (Apache - Mysql - PHP). Two containers are required to run PrestaShop: 

- a Mysql container (5.7 version)
- a PrestaShop container (packaging PHP, PHP modules, PrestaShop codebase and dependencies, and Apache)

### Create a Docker network

Those two containers need to be able to communicate each other. 

```
$ docker network create prestashop-net
```

### Start a Mysql 5.7 container

Then, start a Mysql container:

- with image `mysql:5.7`, 
- with network `prestashop-net`, 
- on exposed `port` 3307, 
- with container name `some-mysql`, 
- and `root password` 'admin'. 

```
$ docker run -ti --name some-mysql --network prestashop-net -e MYSQL_ROOT_PASSWORD=admin -p 3307:3306 -d mysql:5.7
```

### Start the PrestaShop container

Then, start the PrestaShop container: 

- with `name` `some-prestashop`, 
- with `network` `prestashop-net`,
- with environment variable `DB_SERVER` set to `some-mysql`,
- on exposed `port` `8080`
- with `image` `prestashop/prestashop:latest`

```
$ docker run -ti --name some-prestashop --network prestashop-net -e DB_SERVER=some-mysql -p 8080:80 -d prestashop/prestashop:latest
```

### Install PrestaShop database, and begin testing

Then, access `http://localhost:8080` on your browser to begin testing PrestaShop. 
You will land on the installer of PrestaShop. 

When you will be asked for Mysql user, use `root`.
When asked for Mysql password, use `admin`.

### Advanced usages

#### Use a specific PrestaShop version

You can use a specific PrestaShop version by changing the image tag: 

- Use latest image: `prestashop/prestashop:latest`
- Use 1.7: `prestashop/prestashop:latest`
- Use 1.7.8: `prestashop/prestashop:1.7.8`

#### Use a specific PHP version

You can also specify the version of PHP to use:

- Use 8.0.4 image, with PHP 8.1: `prestashop/prestashop:8.0.4-8.1`
- Use 8.0 image, with PHP 7.4: `prestashop/prestashop:8.0-7.4`

#### Use Apache or FPM

You can also specify to use Apache or FPM by appending `-apache` or `-fpm` to the image. 

- Use 8.0.4 image, with PHP 8.1, on apache: `prestashop/prestashop:8.0.4-8.1-apache`
- Use 8.0.4 image, with PHP 8.1, on FPM: `prestashop/prestashop:8.0.4-8.1-fpm`

## Use docker-compose to manage your stack

Docker-compose will help starting and stopping your PrestaShop stack, persist your database with a volume, persist your installation, and will allow you to mount local modules and/or themes in PrestaShop. 

### Create the docker-compose.yml manifest

```yaml
version: '3'
services:
    mysql:
        container_name: some-mysql
        image: mysql:5.7
        restart: always
        environment:
             MYSQL_ROOT_PASSWORD: admin
             MYSQL_DATABASE: prestashop
        networks:
        - prestashop_network
    prestashop:
        container_name: prestashop
        image: prestashop/prestashop:latest
        restart: always
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
networks:
    prestashop_network:
```

{{% notice info %}}
When using a M1-chip Mac, you may add: `platform: linux/x86_64` on each container declaration. 
{{% /notice %}}

{{% notice note %}}
It is a grood practice to change install/ and admin/ directory names. In this example, we set them to `admin4577` and `install4577`. When installing PrestaShop with Docker for the first time, you need to access `https://localhost:8080/install4577`. 
{{% /notice %}}

In the directory where the docker-compose.yml file is located, run: 

- Start the stack: 

```
docker-compose up
```

- Start the stack, in background: 

```
docker-compose up -d
```

- Stop a background stack: 

```
docker-compose down
```

### Bind a volume for Mysql persisting

If you don't bind a volume to the Mysql container, the database content will not be persisted when stopping / restarting the stack.

To avoid this, add a `volume` to your Mysql container: 

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

### Bind a volume for Installation persisting

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

### Bind a local module to your manifest

Lets consider we have a `testModule` PrestaShop Module. 

Create a `modules/` directory, and drop in your `testModule` directory.

Create a bind mount in your docker-compose.yml:

```yaml
...
    prestashop:
        container_name: prestashop
        ...
        volumes:
          - type: bind
            source: ./modules/testModule # local path to the module
            target: /var/www/html/modules/testModule # path to be mounted in the container
...
```

And that's it: your module is available on the PrestaShop Docker instance, and changes made in the local directory of the module are automatically synchronized on the PrestaShop Docker instance. 

### Bind a local theme to your manifest

Lets consider we have a `myTheme` PrestaShop Theme. 

Create a `themes/` directory, and drop in your `myTheme` directory.

Create a bind mount in your docker-compose.yml:

```yaml
...
    prestashop:
        container_name: prestashop
        ...
        volumes:
          - type: bind
            source: ./themes/myTheme # local path to the module
            target: /var/www/html/themes/myTheme # path to be mounted in the container
...
```

And that's it: your theme is available on the PrestaShop Docker instance, and changes made in the local directory of the theme are automatically synchronized on the PrestaShop Docker instance. 

### Complete docker-compose.yml for reference

```yaml
version: '3'
services:
    mysql:
        container_name: some-mysql
        image: mysql:5.7
        restart: always
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
        restart: always
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
version: '3'
services:
...
    phpmyadmin:
      image: phpmyadmin/phpmyadmin
      container_name: phpmyadmin
      links:
        - some-mysql
      environment:
        PMA_HOST: some-mysql
        PMA_PORT: 3306
        PMA_ARBITRARY: 1
      restart: always
      ports:
        - 8081:80
```

### Enter the container to get Symfony logs, execute commands, modify core files or core configuration

You may need to enter the container to parse logs, execute commands, modify core files, or core configuration. 

You can enter in a shell of the container by running in your terminal: 

```bash
docker exec -ti prestashop /bin/bash
```

You will land in the container, in the PrestaShop's directory (`/var/www/html`).

From there, you can:

```bash
php bin/console prestashop:module enable xxx # enables the module xxx
tail -f var/logs/dev.log # tail in interactive mode the dev.log file
# all commands you may need
```

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

If you encounter issues using PrestaShop with Docker, feel free to read our troubleshooting tips on [PrestaShop's Docker Github repository](https://github.com/PrestaShop/docker), or [open an issue](https://github.com/PrestaShop/docker/issues) if the probleme is not already addressed.