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

use Sylius\Behat\Page\Admin\Crud\UpdatePage as BaseUpdatePage;

final class UpdatePage extends BaseUpdatePage implements UpdatePageInterface
{
    public function changeDescriptionTo(string $description): void
    {
        $this->getElement('description')->setValue($description);
    }

    public function getDescription(): string
    {
        return $this->getElement('description')->getValue();
    }

    protected function getDefinedElements(): array
    {
        return array_merge(
            parent::getDefinedElements(),
            [
                'description' => '#babdev_sylius_supplier_supplier_description',
            ]
        );
    }
}
