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

namespace BabDev\SyliusSupplierPlugin\Fixture;

use Sylius\Bundle\CoreBundle\Fixture\AbstractResourceFixture;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

final class SupplierFixture extends AbstractResourceFixture
{
    public function getName(): string
    {
        return 'babdev_sylius_supplier_supplier';
    }

    /**
     * @psalm-suppress PossiblyUndefinedMethod
     * @psalm-suppress PossiblyNullReference
     */
    protected function configureResourceNode(ArrayNodeDefinition $resourceNode): void
    {
        /**
         * @phpstan-ignore-next-line
         */
        $resourceNode
            ->children()
                ->scalarNode('name')->end()
                ->scalarNode('description')->end()
                ->scalarNode('contact_email')->end()
        ;
    }
}
