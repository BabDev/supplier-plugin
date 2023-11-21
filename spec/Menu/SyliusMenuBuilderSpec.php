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

namespace spec\BabDev\SyliusSupplierPlugin\Menu;

use Knp\Menu\ItemInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class SyliusMenuBuilderSpec extends ObjectBehavior
{
    public function it_adds_a_menu_item_to_the_configuration_menu(
        MenuBuilderEvent $event,
        ItemInterface $adminMenu,
        ItemInterface $configurationMenu,
        ItemInterface $supplierMenu
    ): void {
        $event->getMenu()->willReturn($adminMenu);
        $adminMenu->getChild('configuration')->willReturn($configurationMenu);
        $configurationMenu->addChild('routes', ['route' => 'babdev_sylius_supplier_admin_supplier_index'])->willReturn($supplierMenu);
        $supplierMenu->setLabel('babdev_sylius_supplier.menu.admin.suppliers')->willReturn($supplierMenu);
        $supplierMenu->setLabelAttribute('icon', 'shopping bag')->willReturn($supplierMenu);

        $this->configureSupplierMenu($event);
    }
}
