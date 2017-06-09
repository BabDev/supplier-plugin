# Supplier Plugin by BabDev for Sylius [![License](https://img.shields.io/packagist/l/babdev/supplier-plugin.svg)](https://packagist.org/packages/babdev/supplier-plugin) [![Version](https://img.shields.io/packagist/v/babdev/supplier-plugin.svg)](https://packagist.org/packages/babdev/supplier-plugin) [![Build Status](https://travis-ci.org/BabDev/supplier-plugin.svg?branch=master)](https://travis-ci.org/BabDev/supplier-plugin)

Simple Supplier integration for Sylius.

## Usage

1. Install it:

    ```bash
    $ composer require babdev/supplier-plugin
    ```
    
2. Add this bundle in `AppKernel.php`:

    ```php
    new \BabDev\SupplierPlugin\BabDevSupplierPlugin(),
    ```

3. Import config file in `app/config/config.yml`:

    ```yaml
    imports:
       - { resource: "@BabDevSupplierPlugin/Resources/config/app/config.yml" }
    ```

4. Import routing files in `app/config/routing.yml`:

    ```yaml
    babdev_supplier_admin:
        resource: "@BabDevSupplierPlugin/Resources/config/app/admin_routing.yml"
        prefix: /admin # root path of SyliusAdmin
    ```

## Complementary documentation

- [Sylius ResourceBundle](http://docs.sylius.org/en/latest/bundles/SyliusResourceBundle/)
- [Sylius GridBundle](http://docs.sylius.org/en/latest/bundles/SyliusGridBundle/)
