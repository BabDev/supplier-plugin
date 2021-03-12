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

use Doctrine\Common\Collections\Collection;

interface SuppliersAwareInterface
{
    /**
     * @return Collection<array-key, SupplierInterface>
     */
    public function getSuppliers(): Collection;

    public function hasSupplier(SupplierInterface $supplier): bool;

    public function addSupplier(SupplierInterface $supplier): void;

    public function removeSupplier(SupplierInterface $supplier): void;
}
