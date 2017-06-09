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

use Doctrine\Common\Collections\Collection;

/**
 * @author Michael Babker <michael.babker@gmail.com>
 */
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
    public function addSupplier(SupplierInterface $supplier);

    /**
     * @param SupplierInterface $supplier
     */
    public function removeSupplier(SupplierInterface $supplier);
}
