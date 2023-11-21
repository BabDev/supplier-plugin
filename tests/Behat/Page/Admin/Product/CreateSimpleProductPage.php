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

namespace Tests\BabDev\SyliusSupplierPlugin\Behat\Page\Admin\Product;

use Sylius\Behat\Page\Admin\Product\CreateSimpleProductPage as BaseCreatePage;

final class CreateSimpleProductPage extends BaseCreatePage
{
    public function selectSupplier(string $supplier): void
    {
        $this->getElement('supplier')->selectOption($supplier);
    }

    protected function getDefinedElements(): array
    {
        return array_merge(
            parent::getDefinedElements(),
            [
                'supplier' => '#sylius_product_supplier',
            ]
        );
    }
}
