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
     * @return Collection|SupplierInterface[]
     */
    public function getSuppliers(): Collection;

    /**
     * @param SupplierInterface $supplier
     *
     * @return bool
     */
    public function hasSupplier(SupplierInterface $supplier): bool;

    /**
     * @param SupplierInterface $supplier
     */
    public function addSupplier(SupplierInterface $supplier): void;

    /**
     * @param SupplierInterface $supplier
     */
    public function removeSupplier(SupplierInterface $supplier): void;
}
