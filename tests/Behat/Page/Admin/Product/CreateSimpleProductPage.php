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

namespace BabDev\SyliusSupplierPlugin\Tests\Behat\Page\Admin\Product;

use Sylius\Behat\Page\Admin\Product\CreateSimpleProductPage as BaseCreatePage;

/**
 * @author Michael Babker <michael.babker@gmail.com>
 */
final class CreateSimpleProductPage extends BaseCreatePage
{
    /**
     * @param $supplier
     * @throws \Behat\Mink\Exception\ElementNotFoundException
     */
    public function selectSupplier($supplier)
    {
        $this->getElement('supplier')->selectOption($supplier);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefinedElements()
    {
        return array_merge(
            parent::getDefinedElements(),
            [
                'supplier' => '#sylius_product_supplier',
            ]
        );
    }
}
