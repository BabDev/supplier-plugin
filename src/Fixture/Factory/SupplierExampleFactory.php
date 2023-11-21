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

namespace BabDev\SyliusSupplierPlugin\Fixture\Factory;

use BabDev\SyliusSupplierPlugin\Model\SupplierInterface;
use Faker\Factory;
use Faker\Generator;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AbstractExampleFactory;
use Sylius\Component\Core\Formatter\StringInflector;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class SupplierExampleFactory extends AbstractExampleFactory
{
    private Generator $faker;

    private OptionsResolver $optionsResolver;

    /**
     * @param FactoryInterface<SupplierInterface> $supplierFactory
     */
    public function __construct(
        private FactoryInterface $supplierFactory
    ) {
        $this->faker = Factory::create();
        $this->optionsResolver = new OptionsResolver();

        $this->configureOptions($this->optionsResolver);
    }

    public function create(array $options = []): SupplierInterface
    {
        $options = $this->optionsResolver->resolve($options);

        $supplier = $this->supplierFactory->createNew();
        $supplier->setName($options['name']);
        $supplier->setCode($options['code']);
        $supplier->setDescription($options['description']);
        $supplier->setContactEmail($options['contact_email']);

        return $supplier;
    }

    protected function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefault('name', fn (Options $options): string  => $this->faker->words(3, true))
            ->setAllowedTypes('name', 'string')

            ->setDefault('code', static fn (Options $options): string => StringInflector::nameToCode($options['name']))
            ->setAllowedTypes('code', 'string')

            ->setDefault('description', fn (Options $options): string => $this->faker->paragraphs(3, true))
            ->setAllowedTypes('description', 'string')

            ->setDefault('contact_email', null)
        ;
    }
}
