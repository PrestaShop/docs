---
title: Back-Office Benchmark
weight: 3
---

How to benchmark your PrestaShop Shop (Back-office)
==================

## Benchmark methodology
In order to benchmark the performances of the backoffice of your shop, you will use the **[Gatling](https://gatling.io/)** testing tool.

## What is Gatling?
**[Gatling](https://gatling.io/)** is a stress tool. Development is currently focusing on HTTP support. We won’t explain here the fundamentals of Gatling, but for more details I suggest you to have a look at **[the Gatling project](https://github.com/gatling/gatling)**.

## Automatic run of Gatling on dockerized installation (recommended)

### Prerequisite

- git
- docker

### Clone the repository

To follow these instructions, you will use the following github repository:
**[PrestaShop performance project](https://github.com/PrestaShop/performance-project)**

```
git clone git@github.com:PrestaShop/performance-project.git
```

### Shop filled with fixtures

Benchmarks require a pre-populated shop. But this shop content has to be the same at each new bench in order to get reproducible results. PrestaShop ShopCreator project will help to generate fixtures, used during shop installation to populate the benched shop.

#### Generate fixtures

    cd performance-project
    cd shop

`README.md` contains instructions to get a working shop filled with fixtures, using “PrestaShop ShopCreator” project

	git clone git@github.com:PrestaShop/prestashop-shop-creator.git

ShopCreator requires a config file to know which fixtures it has to generate. shop-creator-config.yml is the one used in this study. You can customize it to fit your own needs. Copy it in the ShopCreator /config/ directory.

	cp shop-creator-config.yml prestashop-shop-creator/app/config/

First we need to install required ShopCreator dependencies

	composer install

Once your config is ready, run fixture generation in ShopCreator directory 

	php app/console.php

Fixtures are created in /generated_data/ directory. It contains xml files with data for each PrestaShop entity, and images for products, categories…

#### Install a shop with generated fixtures

To use these generated fixtures, you need to copy the directory content into the installation directory of PrestaShop before installing the shop

	cp -R generated_data/* [prestashop]/install/fixtures/fashion/

Make sure you’re not in debug mode! In config/defines.inc.php you should have:

    define('_PS_MODE_DEV_', false);

Once this is done, simply install and run your shop. If you want to use our pre-configured Dockerfile to do this, just keep reading.

#### Install and run the shop with docker

The directory /prestashop-performance/ contains required Dockerfile and scripts to install and run a shop with generated fixtures

	cd ..

##### Build the docker image

Copy the previously generated fixtures in the corresponding directory.

	cp -R prestashop-shop-creator/generated_data/* prestashop-performance/fixtures/

Then you can build the docker image. This one will embed generated fixtures since the Dockerfile copy them in the image.

	cd prestashop-performance
	docker build -t prestashop-bench .

Your image is ready to use.

##### Run the shop

Run the shop with the following command:

```
docker run \
-e FIXTURE_FOLDER=fixtures\
	-e PS_DOMAIN=localhost:8080\
	-e PS_FOLDER_ADMIN=admin1234\
	-e PS_ERASE_DB=1 \
	-e PS_CANONICAL_REDIRECT_DISABLE=1 \
	-e DB_SERVER=host.docker.internal\
	 -e DB_PORT=3306\
	-e DB_NAME=prestashop_bench \
	-e DB_USER=prestashop_bench \
	-e DB_PASSWD=prestashop_bench \
	-p 8080:80 \
	prestashop-bench
```

Installation can take several minutes, depending on the size of fixtures you set, and of course depending on the machine you run it on.

Once it is done, you should access this shop from http://localhost:8080 on your browser.

##### Hosting customizations

The docker image above is used for this study purposes. It is deployed on several stacks detailed in Results.
Docker usage makes it easy to customize prestashop installation, or hosting configuration like php tuning, or mysql tuning.

### Run Gatling scenarios

	cd performance-project
	cd benchmark/gatling
	
{{% notice note %}}
*NOTICE* : Gatling scenarios will create orders on the tested shop. You should not use it on production environment
{{% /notice %}}

#### Build Gatling image

Official gatling image needs to be lightly customized. More precisely we need to pass some java arguments to the scenarios.

    docker build -t prestashop-bench-gatling .

#### Run Gatling

Provided Gatling run command accepts arguments such as user count, customer count, test duration. 

```
docker run -it --rm \
		-v $dir/results:/opt/gatling/results \
		-e JAVA_OPTS="-DusersCount=500
			-DcustomersCount=20
			-DadminsCount=0
			-DrampDurationInSeconds=900
			-DhttpBaseUrlFO=http://shop2.stack1.prestashop.net
			-DhttpBaseUrlBO=http://shop2.stack1.prestashop.net/ps-admin
			-DadminUser=demo@prestashop.com
			-DadminPassword=prestashop" \
		--add-host=sandbox.prestashop.com:192.168.0.4 \
		prestashop/performance-gatling \
		-s LoadSimulation
```

In the example above:
* -v $dir/results:/opt/gatling/results
	mount result/ directory to get gatling results stored in it
* -DrampDurationInSeconds=900
the gatling simulation will add user count during this period (in seconds)
* -DusersCount=500
User count to run FrontOfficeCrawl scenario (crawling product/category pages)
* -DcustomersCount=500
User count to run FrontOfficeCart scenario (placing order)
* -DadminsCount=500
User count to run BackOfficeCrawl scenario
* -s LoadSimulation
The name of the gatling simulation in the code (in the directory user-files/simulations/)

#### Gatling run script

A more scriptable approach could be using the provided `run.sh` script. This script aims to properly rename result directory to a more readable one, and process these results to extract some useful data such as the needed “order-per-hour” KPI.
You could then write your own `batch.sh` to run multiple gatling benchmarks.

## Manual run of Gatling

### Gatling installation

Download Gatling from **[here](https://gatling.io/download/)**, and in the same way have a look at **[the Gatling quickstart page](https://gatling.io/docs/current/quickstart/)**.

Once unzipping the folder it will look like as shown below:


![Gatling](https://i.imgur.com/devRwHF.png)

### Your Gatling is ready to be run
Now let's test if our Gatling works well, so you can launch a sample test included natively in the project with the CLI:

```
➜  ./bin/gatling.sh 
```

And choose the simulation you want to run

![Gatling](https://i.imgur.com/HQ5eCfZ.png)

In my example I run "[1] basic.BasicExampleSimulation"
![Gatling](https://i.imgur.com/nJdOPsB.png)

##### Well done! Our Gatling installation is ready!
After few minutes you can consult the detailed report generated automatically into "results" folder.

### Insert and setup your script

Download the script "[parcoursbackoffice.scala](../parcoursbackoffice.scala)" and put it under "/gatling/user-files/simulations".

Open with your editor the parcoursbackoffice.scala file and setup your script:


* **URL:**
![Gatling](https://i.imgur.com/1Zd3iVK.png)
* **EMAIL:**
![Gatling](https://i.imgur.com/8buaWku.png)
* **PASSWORD:**
![Gatling](https://i.imgur.com/zRMVSiW.png)


### Disable the token

To avoid handling the multiple generated token on each back-office page, you can just disable it by following the steps below:

Setup environnement **_TOKEN_** variable to "disabled" allows you to disable token in urls for Symfony pages and in legacy pages.
If you want to test it you need to setup environment variable (SetEnv _TOKEN_ disabled in Apache vhost configuration file) and check that Symfony pages (Product, Module, ...) urls doesn't contains _token anymore and legacy pages shouldn't contains token parameter.

For example if you site is setup in
/etc/apache2/sites-enabled/000-default.conf

add the value  

```bash
SetEnv _TOKEN_ disabled
```

before

```
< /VirtualHost >
```

>Note:
>don't forget to restart your apache service!
>Now the token are disabled on your PrestaShop site Back-office, this mean that everyone who can log-in your Back-office could access to anypage from the url page.
>That why we recommend you to run the benchmark on a website only dedicated to test.
>If this is not the case, don't forget to restore it when you finish your performance test.

##### Congratulations your performance testing script is ready to be run!
#### Don't forget to improve and share this Gatling script
   
