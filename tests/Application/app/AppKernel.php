<?php

declare(strict_types=1);

use Sylius\Bundle\CoreBundle\Application\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

final class AppKernel extends Kernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles(): array
    {
        return array_merge(
            [
	            new \BabDev\SyliusSupplierPlugin\BabDevSyliusSupplierPlugin(),
            ],
            parent::registerBundles(),
            [
	            new \Sylius\Bundle\AdminBundle\SyliusAdminBundle(),
	            new \Sylius\Bundle\ShopBundle\SyliusShopBundle(),

	            new \FOS\OAuthServerBundle\FOSOAuthServerBundle(), // Required by SyliusApiBundle
	            new \Sylius\Bundle\AdminApiBundle\SyliusAdminApiBundle(),
	        ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load($this->getRootDir() . '/config/config.yml');
    }
}
