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

use Sylius\Behat\Page\Admin\Crud\CreatePage as BaseCreatePage;

final class CreatePage extends BaseCreatePage implements CreatePageInterface
{
    public function setCode(string $code)
    {
        $this->getSession()->getPage()->fillField('Code', $code);
    }

    public function setName(string $name)
    {
        $this->getSession()->getPage()->fillField('Name', $name);
    }

    public function setDescription(string $description)
    {
        $this->getSession()->getPage()->fillField('Description', $description);
    }

    public function setContactEmail(string $contactEmail)
    {
        $this->getSession()->getPage()->fillField('Contact email', $contactEmail);
    }

    protected function getDefinedElements(): array
    {
        return array_merge(
            parent::getDefinedElements(),
            [
                'code' => '#babdev_sylius_supplier_supplier_code',
                'name' => '#babdev_sylius_supplier_supplier_name',
                'description' => '#babdev_sylius_supplier_supplier_description',
                'contact_email' => '#babdev_sylius_supplier_supplier_contact_email',
            ]
        );
    }
}
