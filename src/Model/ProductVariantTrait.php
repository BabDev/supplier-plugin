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

trait ProductVariantTrait
{
    protected ?SupplierPricingInterface $supplierPricing = null;

    public function getSupplierPricing(): ?SupplierPricingInterface
    {
        return $this->supplierPricing;
    }

    public function setSupplierPricing(?SupplierPricingInterface $supplierPricing): void
    {
        $this->supplierPricing = $supplierPricing;
    }
}
