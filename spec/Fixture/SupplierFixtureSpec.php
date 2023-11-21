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

namespace spec\BabDev\SyliusSupplierPlugin\Fixture;

use BabDev\SyliusSupplierPlugin\Model\SupplierInterface;
use Doctrine\Persistence\ObjectManager;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Bundle\FixturesBundle\Fixture\FixtureInterface;

final class SupplierFixtureSpec extends ObjectBehavior
{
    public function let(ObjectManager $supplierManager, ExampleFactoryInterface $supplierFactory): void
    {
        $this->beConstructedWith($supplierManager, $supplierFactory);
    }

    public function it_is_a_fixture(): void
    {
        $this->shouldImplement(FixtureInterface::class);
    }

    public function it_creates_and_persists_a_supplier(
        ObjectManager $supplierManager,
        ExampleFactoryInterface $supplierFactory,
        SupplierInterface $supplier
    ): void {
        $supplierFactory->create(['name' => 'Supplier', 'description' => 'Supplier Description'])->willReturn($supplier);

        $supplierManager->persist($supplier)->shouldBeCalled();
        $supplierManager->flush()->shouldBeCalled();
        $supplierManager->clear()->shouldBeCalled();

        $this->load(['custom' => [['name' => 'Supplier', 'description' => 'Supplier Description']]]);
    }
}
