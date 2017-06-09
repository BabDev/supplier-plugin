<?php

/*
 * This file is part of the BabDevSupplierPlugin package.
 *
 * (c) Michael Babker
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Sylius\Bundle\CoreBundle\Application\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

/**
 * @author Michael Babker <michael.babker@gmail.com>
 */
final class AppKernel extends Kernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles()
    {
        return array_merge(
            [
                new BabDev\SupplierPlugin\BabDevSupplierPlugin(),
            ],
            parent::registerBundles(),
            [
                new Sylius\Bundle\AdminBundle\SyliusAdminBundle(),
                new Sylius\Bundle\ShopBundle\SyliusShopBundle(),

                new FOS\OAuthServerBundle\FOSOAuthServerBundle(), // Required by SyliusAdminApiBundle
                new Sylius\Bundle\AdminApiBundle\SyliusAdminApiBundle(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir() . '/config/config.yml');
    }
}
