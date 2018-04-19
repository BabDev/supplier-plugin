# Supplier Plugin by BabDev for Sylius [![License](https://img.shields.io/packagist/l/babdev/supplier-plugin.svg)](https://packagist.org/packages/babdev/supplier-plugin) [![Version](https://img.shields.io/packagist/v/babdev/supplier-plugin.svg)](https://packagist.org/packages/babdev/supplier-plugin) [![Build Status](https://travis-ci.org/BabDev/supplier-plugin.svg?branch=master)](https://travis-ci.org/BabDev/supplier-plugin)

Simple Supplier integration for Sylius.

## Usage

1. Install it:

    ```bash
    $ composer require babdev/supplier-plugin
    ```
    
2. Add this plugin in `AppKernel.php`.  Note that this plugin MUST be listed before the Sylius core bundles, therefore your `registerBundles()` method should look similar to the following (a pull request would be welcome removing this requirement, as of this writing I haven't identified the issue causing it):

    ```php
    public function registerBundles(): array
    {
        $preResourceBundles = [
            new \BabDev\SyliusSupplierPlugin\BabDevSyliusSupplierPlugin(),
        ];

        $appBundles = [
            // Other local bundles you have installed
        ];

        return array_merge($preResourceBundles, parent::registerBundles(), $appBundles);
    }
    ```

3. Import config file in `app/config/config.yml`:

    ```yaml
    imports:
       - { resource: "@BabDevSyliusSupplierPlugin/Resources/config/app/config.yml" }
    ```

4. Import routing files in `app/config/routing.yml`:

    ```yaml
    babdev_sylius_supplier_admin:
        resource: "@BabDevSyliusSupplierPlugin/Resources/config/app/admin_routing.yml"
        prefix: /admin # root path of SyliusAdmin
    ```

## Complementary documentation

- [Sylius ResourceBundle](http://docs.sylius.org/en/latest/bundles/SyliusResourceBundle/)
- [Sylius GridBundle](http://docs.sylius.org/en/latest/bundles/SyliusGridBundle/)
