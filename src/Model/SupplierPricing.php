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

/**
 * @author Michael Babker <michael.babker@gmail.com>
 */
class SupplierPricing implements SupplierPricingInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var SupplierInterface
     */
    protected $supplier;

    /**
     * @var ProductVariantInterface
     */
    protected $productVariant;

    /**
     * @var int
     */
    protected $price;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getSupplier(): ?SupplierInterface
    {
        return $this->supplier;
    }

    /**
     * {@inheritdoc}
     */
    public function setSupplier(?SupplierInterface $supplier)
    {
        $this->supplier = $supplier;
    }

    /**
     * {@inheritdoc}
     */
    public function getProductVariant(): ?ProductVariantInterface
    {
        return $this->productVariant;
    }

    /**
     * {@inheritdoc}
     */
    public function setProductVariant(?ProductVariantInterface $productVariant)
    {
        $this->productVariant = $productVariant;
    }

    /**
     * {@inheritdoc}
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * {@inheritdoc}
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
    }
}
