<?php

declare(strict_types=1);

namespace Tests\BabDev\SyliusSupplierPlugin\Application;

use PSS\SymfonyMockerContainer\DependencyInjection\MockerContainer;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

final class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    protected function getContainerBaseClass(): string
    {
        if ($this->isTestEnvironment() && class_exists(MockerContainer::class)) {
            return MockerContainer::class;
        }

        return parent::getContainerBaseClass();
    }

    private function isTestEnvironment(): bool
    {
        return str_starts_with($this->getEnvironment(), 'test');
    }
}
