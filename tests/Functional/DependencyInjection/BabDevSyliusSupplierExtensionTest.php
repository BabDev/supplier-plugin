<?php

declare(strict_types=1);

namespace Tests\BabDev\SyliusSupplierPlugin\Functional\DependencyInjection;

use BabDev\SyliusSupplierPlugin\DependencyInjection\BabDevSyliusSupplierExtension;
use BabDev\SyliusSupplierPlugin\Fixture\Factory\SupplierExampleFactory;
use BabDev\SyliusSupplierPlugin\Menu\SyliusMenuBuilder;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;

final class BabDevSyliusSupplierExtensionTest extends AbstractExtensionTestCase
{
    /**
     * @test
     */
    public function the_container_is_loaded_with_the_plugin_services(): void
    {
        $this->load();

        $this->assertContainerBuilderHasService('babdev_sylius_supplier.admin.sylius_menu_builder.supplier', SyliusMenuBuilder::class);
        $this->assertContainerBuilderHasService('babdev_sylius_supplier.fixture.example_factory.supplier', SupplierExampleFactory::class);
    }

    protected function getContainerExtensions(): array
    {
        return [
            new BabDevSyliusSupplierExtension(),
        ];
    }
}
