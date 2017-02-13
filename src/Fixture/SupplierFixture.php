<?php

/*
 * This file is part of the BabDevSyliusSupplierBundle package.
 *
 * (c) Michael Babker
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BabDev\SyliusSupplierBundle\Fixture;

use Sylius\Bundle\CoreBundle\Fixture\AbstractResourceFixture;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * @author Michael Babker <michael.babker@gmail.com>
 */
final class SupplierFixture extends AbstractResourceFixture
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'babdev_sylius_supplier_supplier';
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResourceNode(ArrayNodeDefinition $resourceNode)
    {
        $resourceNode
            ->children()
                ->scalarNode('name')->end()
                ->scalarNode('description')->end()
                ->scalarNode('contact_email')->end()
        ;
    }
}
