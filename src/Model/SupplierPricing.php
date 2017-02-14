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
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * {@inheritdoc}
     */
    public function setSupplier(SupplierInterface $supplier = null)
    {
        $this->supplier = $supplier;
    }

    /**
     * {@inheritdoc}
     */
    public function getProductVariant()
    {
        return $this->productVariant;
    }

    /**
     * {@inheritdoc}
     */
    public function setProductVariant(ProductVariantInterface $productVariant = null)
    {
        $this->productVariant = $productVariant;
    }

    /**
     * {@inheritdoc}
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * {@inheritdoc}
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
}
