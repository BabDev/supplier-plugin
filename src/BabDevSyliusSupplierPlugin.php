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
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class BabDevSyliusSupplierPlugin extends Bundle
{
    use SyliusPluginTrait;

    protected function getBundlePrefix(): string
    {
        return 'babdev_sylius_supplier';
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        if (null === $this->containerExtension) {
            $this->containerExtension = new BabDevSyliusSupplierExtension();
        }

        return $this->containerExtension ?? null;
    }
}
