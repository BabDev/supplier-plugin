<?php

/*
 * This file is part of the BabDevSupplierPlugin package.
 *
 * (c) Michael Babker
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BabDev\SupplierPlugin\Model;

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
    public function getProductVariant(): ?ProductVariantInterface;

    /**
     * @param ProductVariantInterface|null $productVariant
     */
    public function setProductVariant(?ProductVariantInterface $productVariant);

    /**
     * @return int
     */
    public function getPrice(): ?int;

    /**
     * @param int $price
     */
    public function setPrice(int $price);
}
