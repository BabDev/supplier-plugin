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

use Sylius\Behat\Page\Admin\Product\UpdateSimpleProductPage as BaseUpdatePage;

/**
 * @author Michael Babker <michael.babker@gmail.com>
 */
final class UpdateSimpleProductPage extends BaseUpdatePage
{
    /**
     * {@inheritdoc}
     */
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
