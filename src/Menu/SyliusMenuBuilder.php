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

namespace BabDev\SyliusSupplierPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class SyliusMenuBuilder
{
    public function configureSupplierMenu(MenuBuilderEvent $event): void
    {
        $adminMenu = $event->getMenu();

        $configurationMenu = $adminMenu->getChild('configuration');

        if (null !== $configurationMenu) {
            $configurationMenu
                ->addChild('routes', ['route' => 'babdev_sylius_supplier_admin_supplier_index'])
                ->setLabel('babdev_sylius_supplier.menu.admin.suppliers')
                ->setLabelAttribute('icon', 'shopping bag')
            ;
        }
    }
}
