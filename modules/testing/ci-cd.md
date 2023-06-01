---
title: Continuous Integration / Continuous Deployment
menuTitle: CI/CD
weight: 3
---

# Continuous Integration / Continuous Deployment

In the previous page we detailed some testing tools and how to execute them. They may be run locally, in order to check that the code is fine before pushing it to a remote git repository, but they can also be automatically run by a dedicated test environment after each push. This can be useful to prevent code being pushed to production if one of your tools reports an issue you missed.

Our modules are hosted on GitHub and GitLab repositories and each of them provide a solution for running these tests automatically. The following files allow the tools to run on both environments.

## GitHub

This example is taken from the module `ps_checkout`. The latest version and more checks can be found in https://github.com/PrestaShopCorp/ps_checkout/tree/master/.github/workflows.

### PHP Checks

```yaml
name: PHP tests
on: [push, pull_request]
jobs:
  # Check that there are no syntax errors in the project
  php-linter:
    name: PHP Syntax check 5.6|7.2|7.3
    runs-on: ubuntu-latest
    steps:
      - name: Checkout
        uses: actions/checkout@v2.0.0

      - name: PHP syntax checker 5.6
        uses: prestashop/github-action-php-lint/5.6@master

      - name: PHP syntax checker 7.2
        uses: prestashop/github-action-php-lint/7.2@master

      - name: PHP syntax checker 7.3
        uses: prestashop/github-action-php-lint/7.3@master

  # Check that the PHP code follows the coding standards
  php-cs-fixer:
    name: PHP-CS-Fixer
    runs-on: ubuntu-latest
    steps:
      - name: Checkout
        uses: actions/checkout@v2.0.0

      - name: Run PHP-CS-Fixer
        uses: prestashopcorp/github-action-php-cs-fixer@master

  # Run PHPStan against the module and a PrestaShop release
  phpstan:
    name: PHPStan
    runs-on: ubuntu-latest
    strategy:
      matrix:
        presta-versions: ['1.7.0.3', 'latest']
    steps:
      - name: Checkout
        uses: actions/checkout@v2.0.0

      # Add vendor folder in cache to make next builds faster
      - name: Cache vendor folder
        uses: actions/cache@v1
        with:
          path: vendor
          key: php-${{ hashFiles('composer.lock') }}

      # Add composer local folder in cache to make next builds faster
      - name: Cache composer folder
        uses: actions/cache@v1
        with:
          path: ~/.composer/cache
          key: php-composer-cache

      - run: composer install

      # Docker images prestashop/prestashop may be used, even if the shop remains uninstalled
      - name: Pull PrestaShop files (Tag ${{ matrix.presta-versions }})
        run: docker run -tid --rm -v ps-volume:/var/www/html --name temp-ps prestashop/prestashop:${{ matrix.presta-versions }}

      # Run a container for PHPStan, having access to the module content and PrestaShop sources.
      # This tool is outside the composer.json because of the compatibility with PHP 5.6
      - name : Run PHPStan
        run: docker run --rm --volumes-from temp-ps -v $PWD:/web/module -e _PS_ROOT_DIR_=/var/www/html --workdir=/web/module phpstan/phpstan:0.12 analyse --configuration=/web/module/tests/phpstan/phpstan.neon

  header-stamp:
    name: Check license headers
    runs-on: ubuntu-latest
    steps:
      - name: Checkout
        uses: actions/checkout@v2

      - name: Cache vendor folder
        uses: actions/cache@v1
        with:
          path: vendor
          key: php-${{ hashFiles('composer.lock') }}

      - name: Cache composer folder
        uses: actions/cache@v1
        with:
          path: ~/.composer/cache
          key: php-composer-cache

      - run: composer install

      - name: Run Header Stamp in Dry Run mode
        run: php vendor/bin/header-stamp --license=vendor/prestashop/header-stamp/assets/afl.txt --exclude=vendor,tests,_dev --dry-run
```

### Build module artifact

```yaml
name: Build
on: [push, pull_request]

jobs:
  deploy:
    name: build dependencies & create artifact
    runs-on: ubuntu-latest
    steps:
      - name: Checkout
        uses: actions/checkout@v2.0.0

      # Optional step compiling JS files
      - name: Build JS dependencies
        uses: PrestaShopCorp/github-action-build-js/12@v1.0
        with:
          cmd: yarn
          path: ./_dev

      # Install PHP dependencies (Production ONLY)
      - name: Install composer dependencies
        run: composer install --no-dev -o

      # Remove development files
      - name: Clean-up project
        uses: PrestaShopCorp/github-action-clean-before-deploy@v1.0

      # Zip files and upload to artifacts list
      - name: Create & upload artifact
        uses: actions/upload-artifact@v1
        with:
          name: ${{ github.event.repository.name }}
          path: ../
```

## GitLab

This example is taken from one of our module sold on the marketplace, hosted on GitLab.

```yaml
stages:
  - tests
  - build
  - deploy

# Preliminary code to run, preparing the environment for a PHP job.
# Install wget, git and composer, then get dependencies.
.before_script_php_template: &before_script_php
  before_script:
    - apt-get update && apt-get install wget git zip unzip -y
    - wget https://composer.github.io/installer.sig -O - -q | tr -d '\n' > installer.sig
    - php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    - php -r "if (hash_file('SHA384', 'composer-setup.php') === file_get_contents('installer.sig')) { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    - php composer-setup.php
    - php -r "unlink('composer-setup.php'); unlink('installer.sig');"

test:php-5.6:
  <<: *before_script_php
  image: php:5.6
  stage: tests
  script:
  - find . -type f -name '*.php' ! -path "./vendor/*" ! -path "./tests/*" -exec php -l -n {} \; | (! grep -v "No syntax errors detected")

test:php-7.2:
  <<: *before_script_php
  image: php:7.2
  stage: tests
  script:
  - find . -type f -name '*.php' ! -path "./vendor/*" ! -path "./tests/*" -exec php -l -n {} \; | (! grep -v "No syntax errors detected")

php-cs-fixer-7-2:
  <<: *before_script_php
  image: php:7.2
  stage: tests
  script: |
    php composer.phar install --dev
    php -d memory_limit=-1 vendor/bin/php-cs-fixer fix --dry-run --diff --using-cache=no --diff-format udiff

phpstan-php-7-2:
  <<: *before_script_php
  variables:
    _PS_ROOT_DIR_: /var/www/html/
  image: prestashop/prestashop:1.7-7.2-apache
  stage: tests
  script: |
    php composer.phar install --dev
    php composer.phar global require phpstan/phpstan-shim:0.12
    ln -s /builds/ps-addons/$CI_PROJECT_NAME /var/www/html/modules/$CI_PROJECT_NAME
    php -d memory_limit=-1 ~/.composer/vendor/bin/phpstan analyse --configuration=/var/www/html/modules/$CI_PROJECT_NAME/tests/phpstan/phpstan.neon

# Optional job installing JS dependencies and compiling scripts
before-deploy:
  image: node:10.16
  stage: build
  artifacts:
    untracked: true
  script:
    - npm install
    - npm run build

# Clean development files and zip content for the marketplace
deploy-artifact-release:
  <<: *before_script_php
  image: php:7.2
  stage: deploy
  script: |
    php composer.phar install --no-dev -o
    rm -rf node_modules
    rm -rf _dev
    rm -f .browserlistrc
    rm -f .eslintrc.js
    rm -f .postcssrc.js
    rm -f babel.config.js
    rm -f vue.config.js
    rm -f .package.json
    rm -f .package-lock.json
    rm -f .php_cs.dist
    rm -f .gitlab-ci.yml
    rm -f .editorconfig
    rm -f Makefile
    rm -f docker-compose.yml
    rm -rf .git
    rm -f .gitignore
    rm -rf tests
    rm -f composer.phar
    mkdir ../module
    mv * ../module
    mkdir $CI_PROJECT_NAME
    mv ../module/* $CI_PROJECT_NAME

  artifacts:
    name: $CI_PROJECT_NAME
    paths:
    - $CI_PROJECT_NAME
```
