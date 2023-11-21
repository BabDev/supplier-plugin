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

namespace spec\BabDev\SyliusSupplierPlugin\Model;

use BabDev\SyliusSupplierPlugin\Model\SupplierInterface;
use BabDev\SyliusSupplierPlugin\Model\SupplierPricingInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Product\Model\ProductVariantInterface;

final class SupplierPricingSpec extends ObjectBehavior
{
    public function it_implements_supplier_pricing_interface(): void
    {
        $this->shouldImplement(SupplierPricingInterface::class);
    }

    public function it_has_no_id_by_default(): void
    {
        $this->getId()->shouldReturn(null);
    }

    public function it_has_no_supplier_by_default(): void
    {
        $this->getSupplier()->shouldReturn(null);
    }

    public function its_supplier_is_mutable(SupplierInterface $supplier): void
    {
        $this->setSupplier($supplier);
        $this->getSupplier()->shouldReturn($supplier);
    }

    public function it_has_no_product_variant_by_default(): void
    {
        $this->getProductVariant()->shouldReturn(null);
    }

    public function its_product_variant_is_mutable(ProductVariantInterface $productVariant): void
    {
        $this->setProductVariant($productVariant);
        $this->getProductVariant()->shouldReturn($productVariant);
    }

    public function it_has_no_price_by_default(): void
    {
        $this->getPrice()->shouldReturn(null);
    }

    public function its_price_is_mutable(): void
    {
        $this->setPrice(42);
        $this->getPrice()->shouldReturn(42);
    }
}
