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

namespace Tests\BabDev\SyliusSupplierPlugin\Behat\Page\Admin\Supplier;

use Sylius\Behat\Page\Admin\Crud\CreatePageInterface as BaseCreatePageInterface;

interface CreatePageInterface extends BaseCreatePageInterface
{
    public function setCode(string $name): void;

    public function setName(string $name): void;

    public function setDescription(string $description): void;

    public function setContactEmail(string $contactEmail): void;
}
