<?php

/*
 * This file is part of the BabDevSupplierPlugin package.
 *
 * (c) Michael Babker
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace BabDev\SupplierPlugin\Fixture\Factory;

use BabDev\SupplierPlugin\Model\SupplierInterface;
use Faker\Factory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Core\Formatter\StringInflector;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class SupplierExampleFactory implements ExampleFactoryInterface
{
    /**
     * @var FactoryInterface
     */
    private $supplierFactory;

    /**
     * @var \Faker\Generator
     */
    private $faker;

    /**
     * @var OptionsResolver
     */
    private $optionsResolver;

    /**
     * @param FactoryInterface $supplierFactory
     * @param RepositoryInterface $supplierRepository
     */
    public function __construct(FactoryInterface $supplierFactory, RepositoryInterface $supplierRepository)
    {
        $this->supplierFactory = $supplierFactory;

        $this->faker = Factory::create();
        $this->optionsResolver =
            (new OptionsResolver())
                ->setDefault('name', function (Options $options) {
                    return StringInflector::nameToCode($this->faker->words(3, true));
                })
                ->setAllowedTypes('name', 'string')

                ->setDefault('code', function (Options $options) {
                    return StringInflector::nameToCode($options['name']);
                })
                ->setAllowedTypes('code', 'string')

                ->setDefault('description', function (Options $options) {
                    return $this->faker->paragraphs(3, true);
                })
                ->setAllowedTypes('description', 'string')

                ->setDefault('contact_email', null)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $options = [])
    {
        $options = $this->optionsResolver->resolve($options);

        /** @var SupplierInterface $supplier */
        $supplier = $this->supplierFactory->createNew();
        $supplier->setName($options['name']);
        $supplier->setCode($options['code']);
        $supplier->setDescription($options['description']);
        $supplier->setContactEmail($options['contact_email']);

        return $supplier;
    }
}
