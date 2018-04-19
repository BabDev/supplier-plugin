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

namespace BabDev\SyliusSupplierPlugin\Model;

use Sylius\Component\Product\Model\ProductVariantInterface;

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
    public function setSupplier(?SupplierInterface $supplier): void
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
    public function setProductVariant(?ProductVariantInterface $productVariant): void
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
    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }
}
