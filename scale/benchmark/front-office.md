---
title: Front-Office Benchmark
weight: 2
---

How to benchmark your PrestaShop Shop (Front-office)
==================

## Automatically benchmark with `Gatling` (recommended)

Follow instruction on **[Back-Office benchmark page]({{< relref "/8/scale/benchmark/back-office" >}})** to get a pre-populated shop and to run Gatling scenarios on it.

**[PrestaShop performance project](https://github.com/PrestaShop/performance-project)** on Github includes Front-Office scenarios you can edit to get your own scenarios running.

## Benchmark with `Siege` tool

### Benchmark methodology
In order to benchmark the performances of your shop, you will use the siege testing tool.
Try to always use the latest available version <a href="http://download.joedog.org/siege/siege-latest.tar.gz">HERE</a>.
 
### Setup siege configuration

Create a txt file `url.txt` with various urls from your shop: (prepend with the domain of your shop)

```text
http://localhost:8080/
http://localhost:8080/panier
http://localhost:8080/meilleures-ventes
http://localhost:8080/nouveaux-produits
http://localhost:8080/promotions
http://localhost:8080/men/1-1-hummingbird-printed-t-shirt.html#/1-taille-s/8-couleur-blanc
http://localhost:8080/accessories/3-mug-the-best-is-yet-to-come.html
http://localhost:8080/3-clothes
http://localhost:8080/6-accessories
http://localhost:8080/3-clothes?q=Prix-€-28-34
http://localhost:8080/magasins
http://localhost:8080/fournisseur
http://localhost:8080/recherche?controller=search&s=sweater
http://localhost:8080/2-accueil
```

### Run the siege benchmark

Then run a siege benchmark using this file:
```text
siege -b -i -c 1 -t 20S --no-parser -f url.txt
```

We will first warmup the cache by testing 1 time with 1 concurrent user, and then progressively 
raise the number of concurrent users until the performances actually decreases.


Raise the concurrent parameter (-c 1) to the number of concurrent users you want to test.

Ex for 10 concurrent users without MySQL query cache:

```text
siege -b -i -c 10 -t 20S --no-parser -f url.txt  

Lifting the server siege...
Transactions:		         879 hits
Availability:		      100.00 %
Elapsed time:		       19.26 secs
Data transferred:	       37.32 MB
Response time:		        0.22 secs
Transaction rate:	       45.64 trans/sec
Throughput:		        1.94 MB/sec
Concurrency:		        9.92
Successful transactions:         879
Failed transactions:	           0
Longest transaction:	        0.68
Shortest transaction:	        0.03
```

With MySQL query cache enabled:

```text
Lifting the server siege...
Transactions:		        1114 hits
Availability:		      100.00 %
Elapsed time:		       19.46 secs
Data transferred:	       46.70 MB
Response time:		        0.17 secs
Transaction rate:	       57.25 trans/sec
Throughput:		        2.40 MB/sec
Concurrency:		        9.93
Successful transactions:        1114
Failed transactions:	           0
Longest transaction:	        0.57
Shortest transaction:	        0.02
```

### Interpret the results

In the siege result output, here is the useful results:

##### Transactions

The total number of pages loaded during the benchmark. The higher the better.

##### Availability

It tells you the amount of pages which have failed to load.

##### Response time

The average response time of your pages. The lower the better.

##### Transaction rate

The number of pages loaded by second. The higher the better.

##### Concurrency

The number of concurrent transaction the software has been able to run. Should be close to the requested 
concurrent user setting.

##### Failed transactions

Closely related to Availability, the number of pages which have failed to load (404, 503, ...)
