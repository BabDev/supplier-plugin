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

namespace BabDev\SyliusSupplierPlugin\DependencyInjection;

use Sylius\Bundle\ResourceBundle\DependencyInjection\Extension\AbstractResourceExtension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

final class BabDevSyliusSupplierExtension extends AbstractResourceExtension
{
    public function getAlias(): string
    {
        return 'babdev_sylius_supplier';
    }

    public function load(array $configs, ContainerBuilder $container): void
    {
        /** @psalm-suppress PossiblyNullArgument */
        $config = $this->processConfiguration($this->getConfiguration([], $container), $configs);

        $this->registerResources('babdev_sylius_supplier', $config['driver'], $config['resources'], $container);

        $loader = new PhpFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.php');
    }
}
