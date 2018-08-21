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

namespace BabDev\SyliusSupplierPlugin\Tests\Behat\Context\Ui\Admin;

use BabDev\SyliusSupplierPlugin\Tests\Behat\Page\Admin\Product\CreateSimpleProductPage;
use BabDev\SyliusSupplierPlugin\Tests\Behat\Page\Admin\Product\UpdateSimpleProductPage;
use Behat\Behat\Context\Context;

/**
 * @author Michael Babker <michael.babker@gmail.com>
 */
final class ManagingProductsContext implements Context
{
    /**
     * @var CreateSimpleProductPage
     */
    private $createSimpleProductPage;

    /**
     * @var UpdateSimpleProductPage
     */
    private $updateSimpleProductPage;

    public function __construct(CreateSimpleProductPage $createSimpleProductPage, UpdateSimpleProductPage $updateSimpleProductPage)
    {
        $this->createSimpleProductPage = $createSimpleProductPage;
        $this->updateSimpleProductPage = $updateSimpleProductPage;
    }

    /**
     * @When I set its supplier as :supplierName
     */
    public function iSetItsSupplierAs($supplierName)
    {
        $this->createSimpleProductPage->selectSupplier($supplierName);
    }
}
