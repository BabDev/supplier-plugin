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

namespace Tests\BabDev\SyliusSupplierPlugin\Behat\Context\Setup;

use BabDev\SyliusSupplierPlugin\Model\SupplierInterface;
use Behat\Behat\Context\Context;
use Doctrine\Persistence\ObjectManager;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;

final class SupplierContext implements Context
{
    public function __construct(
        private SharedStorageInterface $sharedStorage,
        private ExampleFactoryInterface $supplierExampleFactory,
        private ObjectManager $supplierManager
    ) {
    }

    /**
     * @Given the store has (also) supplier :name
     */
    public function theStoreHasSupplier(string $name): void
    {
        $supplier = $this->supplierExampleFactory->create(['name' => $name]);

        $this->supplierManager->persist($supplier);
        $this->supplierManager->flush();

        $this->sharedStorage->set('supplier', $supplier);
    }

    /**
     * @Given the store has suppliers :firstName and :secondName
     */
    public function theStoreHasSuppliers(string ...$suppliersNames): void
    {
        foreach ($suppliersNames as $suppliersName) {
            $this->theStoreHasSupplier($suppliersName);
        }
    }

    /**
     * @Given the store has supplier :name with description :description
     */
    public function theStoreHasSupplierWithDescription(string $name, string $description): void
    {
        $supplier = $this->supplierExampleFactory->create(['name' => $name, 'description' => $description]);

        $this->supplierManager->persist($supplier);
        $this->supplierManager->flush();

        $this->sharedStorage->set('supplier', $supplier);
    }

    /**
     * @Given /^(it) is not enabled yet$/
     */
    public function itIsNotEnabledYet(SupplierInterface $supplier): void
    {
        $supplier->disable();

        $this->supplierManager->flush();
    }
}
