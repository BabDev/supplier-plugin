<?php

/*
 * This file is part of the BabDevSyliusSupplierPlugin package.
 *
 * (c) Michael Babker
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\BabDev\SyliusSupplierPlugin\Fixture\Factory;

use BabDev\SyliusSupplierPlugin\Model\SupplierInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class SupplierExampleFactorySpec extends ObjectBehavior
{
    /**
     * @param FactoryInterface<SupplierInterface> $supplierFactory
     */
    public function let(FactoryInterface $supplierFactory): void
    {
        $this->beConstructedWith($supplierFactory);
    }

    public function it_is_an_example_factory(): void
    {
        $this->shouldHaveType(ExampleFactoryInterface::class);
    }

    /**
     * @param FactoryInterface<SupplierInterface> $supplierFactory
     */
    public function it_creates_a_supplier(
        FactoryInterface $supplierFactory,
        SupplierInterface $supplier,
    ): void {
        $supplierFactory->createNew()->willReturn($supplier);
        $supplier->setName('Supplier')->shouldBeCalled();
        $supplier->setCode('Supplier')->shouldBeCalled();
        $supplier->setDescription('Supplier Description')->shouldBeCalled();
        $supplier->setContactEmail(null)->shouldBeCalled();

        $this->create([
            'name' => 'Supplier',
            'description' => 'Supplier Description',
        ]);
    }
}
