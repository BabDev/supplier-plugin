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
    /** @var mixed */
    protected $id;

    protected ?SupplierInterface $supplier = null;

    protected ?ProductVariantInterface $productVariant = null;

    protected ?int $price = null;

    /**
     * @phpstan-ignore-next-line
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function getSupplier(): ?SupplierInterface
    {
        return $this->supplier;
    }

    public function setSupplier(?SupplierInterface $supplier): void
    {
        $this->supplier = $supplier;
    }

    public function getProductVariant(): ?ProductVariantInterface
    {
        return $this->productVariant;
    }

    public function setProductVariant(?ProductVariantInterface $productVariant): void
    {
        $this->productVariant = $productVariant;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }
}
