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

/**
 * @author Michael Babker <michael.babker@gmail.com>
 */
interface SupplierAwareInterface
{
    /**
     * @return SupplierInterface
     */
    public function getSupplier();

    /**
     * @param null|SupplierInterface $supplier
     */
    public function setSupplier(SupplierInterface $supplier = null);
}
