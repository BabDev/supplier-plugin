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

/**
 * @author Michael Babker <michael.babker@gmail.com>
 */
final class CreatePage extends BaseCreatePage implements CreatePageInterface
{
    /**
     * {@inheritdoc}
     */
    public function setCode(string $code)
    {
        $this->getSession()->getPage()->fillField('Code', $code);
    }

    /**
     * {@inheritdoc}
     */
    public function setName(string $name)
    {
        $this->getSession()->getPage()->fillField('Name', $name);
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription(string $description)
    {
        $this->getSession()->getPage()->fillField('Description', $description);
    }

    /**
     * @param string $contactEmail
     */
    public function setContactEmail(string $contactEmail)
    {
        $this->getSession()->getPage()->fillField('Contact email', $contactEmail);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefinedElements()
    {
        return array_merge(
            parent::getDefinedElements(),
            [
                'code' => '#babdev_supplier_supplier_code',
                'name' => '#babdev_supplier_supplier_name',
                'description' => '#babdev_supplier_supplier_description',
                'contact_email' => '#babdev_supplier_supplier_contact_email',
            ]
        );
    }
}
