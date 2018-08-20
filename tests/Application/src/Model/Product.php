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

namespace BabDev\SyliusSupplierPlugin\Tests\App\Model;

use BabDev\SyliusSupplierPlugin\Model\ProductTrait;
use BabDev\SyliusSupplierPlugin\Model\SupplierAwareInterface;
use Sylius\Component\Core\Model\Product as BaseProduct;

class Product extends BaseProduct implements SupplierAwareInterface
{
    use ProductTrait;
}
