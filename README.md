# Sylius Supplier Bundle by BabDev [![License](https://img.shields.io/packagist/l/babdev/sylius-supplier-bundle.svg)](https://packagist.org/packages/babdev/sylius-supplier-bundle) [![Version](https://img.shields.io/packagist/v/babdev/sylius-supplier-bundle.svg)](https://packagist.org/packages/babdev/sylius-supplier-bundle) [![Build Status](https://travis-ci.org/BabDev/SyliusSupplierBundle.svg?branch=master)](https://travis-ci.org/BabDev/SyliusSupplierBundle)

Simple Supplier integration for Sylius.

## Usage

1. Install it:

    ```bash
    $ composer require babdev/sylius-supplier-bundle
    ```
    
2. Add this bundle in `AppKernel.php` (**before `SyliusGridBundle`**):

    ```php
    new \BabDev\SyliusSupplierBundle\BabDevSyliusSupplierBundle(),
    ```

3. Import config file in `app/config/config.yml`:

    ```yaml
    imports:
       - { resource: "@BabDevSyliusSupplierBundle/Resources/config/app/config.yml" }
    ```

4. Import routing files in `app/config/routing.yml`:

    ```yaml
    babdev_sylius_supplier_admin:
        resource: "@BabDevSyliusSupplierBundle/Resources/config/app/admin_routing.yml"
        prefix: /admin # root path of SyliusAdmin
    ```

## Complementary documentation

- [Sylius ResourceBundle](http://docs.sylius.org/en/latest/bundles/SyliusResourceBundle/)
- [Sylius GridBundle](http://docs.sylius.org/en/latest/bundles/SyliusGridBundle/)
