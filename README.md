# Sylius Supplier Plugin

[![Latest Stable Version](https://poser.pugx.org/babdev/supplier-plugin/v)](https://packagist.org/packages/babdev/supplier-plugin) [![Latest Unstable Version](https://poser.pugx.org/babdev/supplier-plugin/v/unstable)](https://packagist.org/packages/babdev/supplier-plugin) [![Total Downloads](https://poser.pugx.org/babdev/supplier-plugin/downloads)](https://packagist.org/packages/babdev/supplier-plugin) [![License](https://poser.pugx.org/babdev/supplier-plugin/license)](https://packagist.org/packages/babdev/supplier-plugin) [![Build](https://github.com/BabDev/supplier-plugin/actions/workflows/build.yml/badge.svg?branch=master)](https://github.com/BabDev/supplier-plugin/actions/workflows/build.yml)

The [Sylius](https://sylius.com/) supplier plugin adds support for a supplier model which can be used to extend products.

## Installation

1. Install with Composer

    ```bash
    composer require babdev/supplier-plugin
    ```

2. Without Symfony Flex, manually add the plugin to `config/bundles.php`

    ```php
    BabDev\SyliusSupplierPlugin\BabDevSyliusSupplierPlugin::class => ['all' => true],
    ```

3. Import config 
   
    (in `config/packages/_sylius.yaml` or `config/packages/babdev_sylius_supplier.yaml)`)

    ```yaml
    imports:
        - { resource: "@BabDevSyliusSupplierPlugin/Resources/config/app/config.yml" }
    ```

4. Import the routing
   
    (in `config/routes.yaml` or `config/routes/babdev_sylius_supplier.yaml`)

    ```yaml
    babdev_sylius_supplier_admin:
        resource: "@BabDevSyliusSupplierPlugin/Resources/config/app/admin_routing.yml"
        prefix: /%sylius_admin.path_name%
    ```

5. Add the corresponding traits

    - [Product](tests/Application/src/Model/Product.php)

        ```php
        use BabDev\SyliusSupplierPlugin\Model\ProductTrait;
        use BabDev\SyliusSupplierPlugin\Model\SupplierAwareInterface;
        use Sylius\Component\Core\Model\Product as BaseProduct;
        
        class Product extends BaseProduct implements SupplierAwareInterface
        {
            use ProductTrait;
        }
        ```
    
    - [ProductVariant](tests/Application/src/Model/ProductVariant.php)
    
        ```php
        use BabDev\SyliusSupplierPlugin\Model\ProductVariantTrait;
        use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;
        
        class ProductVariant extends BaseProductVariant
        {
            use ProductVariantTrait;
        }
        ```

6. Add the Doctrine mapping 

    - [Product](tests/Application/config/doctrine/Product.orm.xml)

        ```xml
        <many-to-one field="supplier" target-entity="BabDev\SyliusSupplierPlugin\Model\SupplierInterface">
            <join-column name="supplier_id" referenced-column-name="id" nullable="true" />
        </many-to-one>
        ```

    - [ProductVariant](tests/Application/config/doctrine/ProductVariant.orm.xml)

        ```xml
          <many-to-one field="supplierPricing" target-entity="BabDev\SyliusSupplierPlugin\Model\SupplierPricingInterface" inversed-by="productVariant">
              <join-column name="supplier_pricing_id" referenced-column-name="id" nullable="true" on-delete="SET NULL" />
              <cascade>
                  <cascade-all/>
              </cascade>
          </many-to-one>
        ```

6. Add the field to the admin product form, for example in [templates/bundles/SyliusAdminBundle/Product/Tab/_details.html.twig](tests/Application/templates/bundles/SyliusAdminBundle/Product/Tab/_details.html.twig)

    ```twig
    {{ form_row(form.supplier) }}
    ```

7. Update database schema via Doctrine migrations

    - Generate the migration

        ```bash
        bin/console doctrine:migrations:diff
        ```

   - Check the generated migration, then execute it

        ```bash
        bin/console doctrine:migrations:migrate
        ```

## Development and testing

### Setup

1. Clone the repository (or a repository fork)

    ```bash
    git clone https://github.com/BabDev/supplier-plugin
    cd supplier-plugin
    ```

2. Install the dependencies

    ```bash
    composer install
    ```

3. Initialize the test app with the following commands:

    ```bash
    (cd tests/Application && yarn install)
    (cd tests/Application && yarn build)
    (cd tests/Application && bin/console APP_ENV=test assets:install public)
    (cd tests/Application && bin/console APP_ENV=test doctrine:database:create)
    (cd tests/Application && bin/console APP_ENV=test doctrine:schema:create)
    ```

4. (Optional) Setup MySQL database

    By default, an SQLite database will be used, but you can setup a MySQL database,
    and configure its credentials in `tests/Application/.env.test.local`.
    
    Here's an example for running MySQL database in a Docker container:
    
    ```bash
    docker run -p 3307:3306 --env MYSQL_ROOT_PASSWORD=root --env MYSQL_DATABASE=sylius_test --env MYSQL_USER=sylius --env MYSQL_PASSWORD=sylius --name sylius-supplier-test -v sylius-supplier-test-data:/var/lib/mysql mysql:5.7 
    ```
    
    and the `tests/Application/.env.test.local`
    
    ```
    DATABASE_URL=mysql://sylius:sylius@127.0.0.1:3307/sylius_test?serverVersion=5.7
    ```

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
    (cd tests/Application && APP_ENV=test symfony serve)
    ```

- Using `dev` environment:

    ```bash
    (cd tests/Application && APP_ENV=dev bin/console sylius:fixtures:load)
    (cd tests/Application && APP_ENV=dev symfony serve)
    ```

## Security

If you believe you have discovered a security issue with this plugin, please email michael.babker@gmail.com with information about the issue.  Do **NOT** use the public issue tracker for security issues.

## License

Sylius and this plugin is licensed under the MIT License. See the [LICENSE file](/LICENSE) for full details.
