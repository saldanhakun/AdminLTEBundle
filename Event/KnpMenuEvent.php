<?php

/*
 * This file is part of the AdminLTE bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\AdminLTEBundle\Event;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

/**
 * Collect all MenuItemInterface objects that should be rendered in the menu/navigation section.
 */
class KnpMenuEvent extends ThemeEvent
{
    /**
     * @var ItemInterface
     */
    protected ItemInterface $menu;
    /**
     * @var FactoryInterface
     */
    protected FactoryInterface $factory;
    /**
     * @var array
     */
    private array $options;
    /**
     * @var array
     */
    private array $childOptions;

    /**
     * @param ItemInterface $menu
     * @param FactoryInterface $factory
     * @param array $options
     * @param array $childOptions
     */
    public function __construct(ItemInterface $menu, FactoryInterface $factory, array $options = [], array $childOptions = [])
    {
        $this->menu = $menu;
        $this->factory = $factory;
        $this->options = $options;
        $this->childOptions = $childOptions;
    }

    /**
     * @return ItemInterface
     */
    public function getMenu(): ItemInterface
    {
        return $this->menu;
    }

    /**
     * @return FactoryInterface
     */
    public function getFactory(): FactoryInterface
    {
        return $this->factory;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return array
     */
    public function getChildOptions(): array
    {
        return $this->childOptions;
    }
}
