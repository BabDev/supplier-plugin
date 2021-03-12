# Sylius Supplier Plugin

[![Latest Stable Version](https://poser.pugx.org/babdev/supplier-plugin/v)](https://packagist.org/packages/babdev/supplier-plugin) [![Latest Unstable Version](https://poser.pugx.org/babdev/supplier-plugin/v/unstable)](https://packagist.org/packages/babdev/supplier-plugin) [![Total Downloads](https://poser.pugx.org/babdev/supplier-plugin/downloads)](https://packagist.org/packages/babdev/supplier-plugin) [![License](https://poser.pugx.org/babdev/supplier-plugin/license)](https://packagist.org/packages/babdev/supplier-plugin) [![Build](https://github.com/BabDev/supplier-plugin/actions/workflows/build.yml/badge.svg?branch=master)](https://github.com/BabDev/supplier-plugin/actions/workflows/build.yml)

The [Sylius](https://sylius.com/) supplier plugin adds support for a supplier model which can be used to extend products.

## Documentation

For a comprehensive guide on Sylius Plugins development please go to Sylius documentation,
there you will find the <a href="https://docs.sylius.com/en/latest/plugin-development-guide/index.html">Plugin Development Guide</a>, that is full of examples.

## Quickstart Installation

1. Run `composer create-project sylius/plugin-skeleton ProjectName`.

2. From the plugin skeleton root directory, run the following commands:

    ```bash
    $ (cd tests/Application && yarn install)
    $ (cd tests/Application && yarn build)
    $ (cd tests/Application && APP_ENV=test bin/console assets:install public)
    
    $ (cd tests/Application && APP_ENV=test bin/console doctrine:database:create)
    $ (cd tests/Application && APP_ENV=test bin/console doctrine:schema:create)
    ```

To be able to setup a plugin's database, remember to configure you database credentials in `tests/Application/.env` and `tests/Application/.env.test`.

## Usage

### Running plugin tests

- PHPUnit

  ```bash
  vendor/bin/phpunit
  ```

- PHPSpec

  ```bash
  vendor/bin/phpspec run
  ```

- Behat (non-JS scenarios)

  ```bash
  vendor/bin/behat --strict --tags="~@javascript"
  ```

- Behat (JS scenarios)

   1. [Install Symfony CLI command](https://symfony.com/download).

   2. Start Headless Chrome:

    ```bash
    google-chrome-stable --enable-automation --disable-background-networking --no-default-browser-check --no-first-run --disable-popup-blocking --disable-default-apps --allow-insecure-localhost --disable-translate --disable-extensions --no-sandbox --enable-features=Metal --headless --remote-debugging-port=9222 --window-size=2880,1800 --proxy-server='direct://' --proxy-bypass-list='*' http://127.0.0.1
    ```

   3. Install SSL certificates (only once needed) and run test application's webserver on `127.0.0.1:8080`:

    ```bash
    symfony server:ca:install
    APP_ENV=test symfony server:start --port=8080 --dir=tests/Application/public --daemon
    ```

   4. Run Behat:

    ```bash
    vendor/bin/behat --strict --tags="@javascript"
    ```

- Static Analysis

   - Psalm

     ```bash
     vendor/bin/psalm
     ```

   - PHPStan

     ```bash
     vendor/bin/phpstan analyse -c phpstan.neon -l max src/  
     ```

- Coding Standard

  ```bash
  vendor/bin/ecs check src
  ```

### Opening Sylius with your plugin

- Using `test` environment:

    ```bash
    (cd tests/Application && APP_ENV=test bin/console sylius:fixtures:load)
    (cd tests/Application && APP_ENV=test bin/console server:run -d public)
    ```

- Using `dev` environment:

    ```bash
    (cd tests/Application && APP_ENV=dev bin/console sylius:fixtures:load)
    (cd tests/Application && APP_ENV=dev bin/console server:run -d public)
    ```

## Security

If you believe you have discovered a security issue with this plugin, please email michael.babker@gmail.com with information about the issue.  Do **NOT** use the public issue tracker for security issues.

## License

Sylius and this plugin is licensed under the MIT License. See the [LICENSE file](/LICENSE) for full details.
