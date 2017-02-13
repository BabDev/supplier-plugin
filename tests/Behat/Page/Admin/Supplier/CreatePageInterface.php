<?php

/*
 * This file is part of the BabDevSyliusSupplierBundle package.
 *
 * (c) Michael Babker
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BabDev\SyliusSupplierBundle\Tests\Behat\Page\Admin\Supplier;

use Sylius\Behat\Page\Admin\Crud\CreatePageInterface as BaseCreatePageInterface;

/**
 * @author Michael Babker <michael.babker@gmail.com>
 */
interface CreatePageInterface extends BaseCreatePageInterface
{
    /**
     * @param string $name
     */
    public function setCode($name);

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @param string $description
     */
    public function setDescription($description);

    /**
     * @param string $contactEmail
     */
    public function setContactEmail($contactEmail);
}
