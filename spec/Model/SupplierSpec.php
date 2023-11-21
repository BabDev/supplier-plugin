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
use PhpSpec\ObjectBehavior;

final class SupplierSpec extends ObjectBehavior
{
    public function it_implements_supplier_interface(): void
    {
        $this->shouldImplement(SupplierInterface::class);
    }

    public function it_has_no_id_by_default(): void
    {
        $this->getId()->shouldReturn(null);
    }

    public function it_has_no_code_by_default(): void
    {
        $this->getCode()->shouldReturn(null);
    }

    public function its_code_is_mutable(): void
    {
        $this->setCode('supplier');
        $this->getCode()->shouldReturn('supplier');
    }

    public function it_has_no_name_by_default(): void
    {
        $this->getName()->shouldReturn(null);
    }

    public function its_name_is_mutable(): void
    {
        $this->setName('Supplier');
        $this->getName()->shouldReturn('Supplier');
    }

    public function it_has_no_description_by_default(): void
    {
        $this->getDescription()->shouldReturn(null);
    }

    public function its_description_is_mutable(): void
    {
        $this->setDescription('Service provider of Sylius development tools');
        $this->getDescription()->shouldReturn('Service provider of Sylius development tools');
    }

    public function it_has_no_contact_email_by_default(): void
    {
        $this->getContactEmail()->shouldReturn(null);
    }

    public function its_contact_email_is_mutable(): void
    {
        $this->setContactEmail('sylius@example.com');
        $this->getContactEmail()->shouldReturn('sylius@example.com');
    }
}
