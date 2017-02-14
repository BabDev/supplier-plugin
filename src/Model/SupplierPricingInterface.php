<?php

/*
 * This file is part of the BabDevSyliusSupplierBundle package.
 *
 * (c) Michael Babker
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BabDev\SyliusSupplierBundle\Model;

use Sylius\Component\Product\Model\ProductVariantInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * @author Michael Babker <michael.babker@gmail.com>
 */
interface SupplierPricingInterface extends ResourceInterface, SupplierAwareInterface
{
    /**
     * @return ProductVariantInterface
     */
    public function getProductVariant();

    /**
     * @param ProductVariantInterface|null $productVariant
     */
    public function setProductVariant(ProductVariantInterface $productVariant = null);

    /**
     * @return int
     */
    public function getPrice();

    /**
     * @param int $price
     */
    public function setPrice($price);
}
