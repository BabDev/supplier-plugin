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

namespace Tests\BabDev\SyliusSupplierPlugin\Behat\Context\Ui\Admin;

use Tests\BabDev\SyliusSupplierPlugin\Behat\Page\Admin\Product\CreateSimpleProductPage;
use Tests\BabDev\SyliusSupplierPlugin\Behat\Page\Admin\Product\UpdateSimpleProductPage;
use Behat\Behat\Context\Context;

final class ManagingProductsContext implements Context
{
    public function __construct(
        private CreateSimpleProductPage $createSimpleProductPage,
        private UpdateSimpleProductPage $updateSimpleProductPage,
    ) {
    }

    /**
     * @When I set its supplier as :supplierName
     */
    public function iSetItsSupplierAs(string $supplierName): void
    {
        $this->createSimpleProductPage->selectSupplier($supplierName);
    }

    /**
     * @When I change its supplier to :supplierName
     */
    public function iChangeItsSupplierTo(string $supplierName): void
    {
        $this->updateSimpleProductPage->selectSupplier($supplierName);
    }
}
