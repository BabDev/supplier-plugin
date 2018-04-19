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

namespace BabDev\SyliusSupplierPlugin\Tests\Behat\Page\Admin\Supplier;

use Sylius\Behat\Page\Admin\Crud\CreatePageInterface as BaseCreatePageInterface;

/**
 * @author Michael Babker <michael.babker@gmail.com>
 */
interface CreatePageInterface extends BaseCreatePageInterface
{
    /**
     * @param string $name
     */
    public function setCode(string $name);

    /**
     * @param string $name
     */
    public function setName(string $name);

    /**
     * @param string $description
     */
    public function setDescription(string $description);

    /**
     * @param string $contactEmail
     */
    public function setContactEmail(string $contactEmail);
}
