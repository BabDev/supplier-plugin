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

use Sylius\Behat\Page\Admin\Crud\UpdatePage as BaseUpdatePage;

/**
 * @author Michael Babker <michael.babker@gmail.com>
 */
final class UpdatePage extends BaseUpdatePage implements UpdatePageInterface
{
    /**
     * {@inheritdoc}
     */
    public function changeDescriptionTo($description)
    {
        $this->getElement('description')->setValue($description);
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->getElement('description')->getValue();
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefinedElements()
    {
        return array_merge(
            parent::getDefinedElements(),
            [
                'description' => '#babdev_sylius_supplier_description',
            ]
        );
    }
}
