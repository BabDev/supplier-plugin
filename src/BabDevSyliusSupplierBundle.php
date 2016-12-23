<?php

/*
 * This file is part of the BabDevSyliusSupplierBundle package.
 *
 * (c) Michael Babker
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BabDev\SyliusSupplierBundle;

use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

/**
 * Sylius supplier management bundle.
 *
 * @author Michael Babker <michael.babker@gmail.com>
 */
class BabDevSyliusSupplierBundle extends AbstractResourceBundle
{
    /**
     * {@inheritdoc}
     */
    protected function getBundlePrefix()
    {
        return 'babdev_sylius_supplier';
    }

    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = false;

            $class = $this->getContainerExtensionClass();

            if (class_exists($class)) {
                $extension = new $class();

                if (!$extension instanceof ExtensionInterface) {
                    throw new \LogicException(sprintf('Extension %s must implement Symfony\Component\DependencyInjection\Extension\ExtensionInterface.', $class));
                }

                $this->extension = $extension;
            }
        }

        if ($this->extension) {
            return $this->extension;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getSupportedDrivers()
    {
        return [
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getModelNamespace()
    {
        return 'BabDev\SyliusSupplierBundle\Model';
    }
}
