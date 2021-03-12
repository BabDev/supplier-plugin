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

namespace BabDev\SyliusSupplierPlugin;

use BabDev\SyliusSupplierPlugin\DependencyInjection\BabDevSyliusSupplierExtension;
use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

final class BabDevSyliusSupplierPlugin extends AbstractResourceBundle
{
    use SyliusPluginTrait;

    protected function getBundlePrefix(): string
    {
        return 'babdev_sylius_supplier';
    }

    /**
     * @psalm-suppress DocblockTypeContradiction
     * @psalm-suppress InvalidReturnStatement
     * @psalm-suppress InvalidReturnType
     */
    public function getContainerExtension()
    {
        if (null === $this->containerExtension) {
            $this->containerExtension = new BabDevSyliusSupplierExtension();
        }

        /**
         * @phpstan-ignore-next-line
         */
        return $this->containerExtension === false ? null : $this->containerExtension;
    }

    public function getSupportedDrivers(): array
    {
        return [
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM,
        ];
    }
}
