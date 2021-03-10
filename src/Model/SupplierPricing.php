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
     * @var mixed
     */
    protected $id;

    /**
     * @var SupplierInterface|null
     */
    protected $supplier;

    /**
     * @var ProductVariantInterface|null
     */
    protected $productVariant;

    /**
     * @var int|null
     */
    protected $price;

    /**
     * @phpstan-ignore-next-line
     *
     * @return mixed
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
