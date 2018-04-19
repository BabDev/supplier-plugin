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

namespace BabDev\SyliusSupplierPlugin\Tests\Behat\Context\Setup;

use BabDev\SyliusSupplierPlugin\Model\Supplier;
use Behat\Behat\Context\Context;
use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;

/**
 * @author Michael Babker <michael.babker@gmail.com>
 */
final class SupplierContext implements Context
{
    /**
     * @var SharedStorageInterface
     */
    private $sharedStorage;

    /**
     * @var ExampleFactoryInterface
     */
    private $supplierExampleFactory;

    /**
     * @var ObjectManager
     */
    private $supplierManager;

    /**
     * @param SharedStorageInterface $sharedStorage
     * @param ExampleFactoryInterface $supplierExampleFactory
     * @param ObjectManager $supplierManager
     */
    public function __construct(
        SharedStorageInterface $sharedStorage,
        ExampleFactoryInterface $supplierExampleFactory,
        ObjectManager $supplierManager
    ) {
        $this->sharedStorage = $sharedStorage;
        $this->supplierExampleFactory = $supplierExampleFactory;
        $this->supplierManager = $supplierManager;
    }

    /**
     * @Given the store has supplier :name
     */
    public function theStoreHasSupplier($name)
    {
        $supplier = $this->supplierExampleFactory->create(['name' => $name]);

        $this->supplierManager->persist($supplier);
        $this->supplierManager->flush();

        $this->sharedStorage->set('supplier', $supplier);
    }

    /**
     * @Given the store has suppliers :firstName and :secondName
     */
    public function theStoreHasSuppliers(...$suppliersNames)
    {
        foreach ($suppliersNames as $suppliersName) {
            $this->theStoreHasSupplier($suppliersName);
        }
    }

    /**
     * @Given the store has supplier :name with description :description
     */
    public function theStoreHasStaticContentWithBody($name, $description)
    {
        $supplier = $this->supplierExampleFactory->create(['name' => $name, 'description' => $description]);

        $this->supplierManager->persist($supplier);
        $this->supplierManager->flush();

        $this->sharedStorage->set('supplier', $supplier);
    }

    /**
     * @Given /^(it) is not enabled yet$/
     */
    public function itIsNotEnabledYet(Supplier $supplier)
    {
        $supplier->disable();

        $this->supplierManager->flush();
    }
}
