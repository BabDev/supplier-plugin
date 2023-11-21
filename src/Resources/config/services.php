<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use BabDev\SyliusSupplierPlugin\Fixture\Factory\SupplierExampleFactory;
use BabDev\SyliusSupplierPlugin\Fixture\SupplierFixture;
use BabDev\SyliusSupplierPlugin\Form\Extension\ProductTypeExtension;
use BabDev\SyliusSupplierPlugin\Form\Type\SupplierChoiceType;
use BabDev\SyliusSupplierPlugin\Form\Type\SupplierType;
use BabDev\SyliusSupplierPlugin\Menu\SyliusMenuBuilder;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->set('babdev_sylius_supplier.admin.sylius_menu_builder.supplier', SyliusMenuBuilder::class)
        ->tag('kernel.event_listener', ['event' => 'sylius.menu.admin.main', 'method' => 'configureSupplierMenu'])
    ;

    $services->set('babdev_sylius_supplier.fixture.example_factory.supplier', SupplierExampleFactory::class)
        ->args([
            service('babdev_sylius_supplier.factory.supplier'),
        ])
    ;

    $services->set('babdev_sylius_supplier.fixture.supplier', SupplierFixture::class)
        ->args([
            service('babdev_sylius_supplier.manager.supplier'),
            service('babdev_sylius_supplier.fixture.example_factory.supplier'),
        ])
        ->tag('sylius_fixtures.fixture')
    ;

    $services->set('babdev_sylius_supplier.form.extension.product', ProductTypeExtension::class)
        ->tag('form.type_extension', ['extended-type' => ProductType::class])
    ;

    $services->set('babdev_sylius_product_samples.form.extension.product', ProductTypeExtension::class)
        ->tag('form.type_extension', ['extended-type' => ProductType::class])
    ;

    $services->set('babdev_sylius_supplier.form.type.supplier', SupplierType::class)
        ->args([
            param('babdev_sylius_supplier.model.supplier.class'),
            ['sylius'],
        ])
        ->tag('form.type')
    ;

    $services->set('babdev_sylius_supplier.form.type.supplier_choice', SupplierChoiceType::class)
        ->args([
            service('babdev_sylius_supplier.repository.supplier'),
        ])
        ->tag('form.type')
    ;
};
