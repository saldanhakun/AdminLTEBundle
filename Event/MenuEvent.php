<?php

/*
 * This file is part of the AdminLTE bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\AdminLTEBundle\Event;

use KevinPapst\AdminLTEBundle\Model\MenuItemInterface;
use Knp\Menu\MenuItem;
use Symfony\Component\HttpFoundation\Request;

/**
 * Collect all MenuItemInterface objects that should be rendered in the menu section.
 */
abstract class MenuEvent extends ThemeEvent
{
    /**
     * @var array
     */
    private array $menuRootItems = [];
    /**
     * @var Request|null
     */
    private ?Request $request;

    /**
     * @param Request|null $request
     */
    public function __construct(?Request $request = null)
    {
        $this->request = $request;
    }

    /**
     * @return ?Request
     */
    public function getRequest(): ?Request
    {
        return $this->request;
    }

    /**
     * @return MenuItemInterface[]
     */
    public function getItems(): array
    {
        return $this->menuRootItems;
    }

    /**
     * @param MenuItemInterface $item
     * @return MenuEvent
     */
    public function addItem(MenuItemInterface $item): self
    {
        $this->menuRootItems[$item->getIdentifier()] = $item;

        return $this;
    }

    /**
     * @param string|MenuItemInterface $item
     * @return MenuEvent
     */
    public function removeItem(string|MenuItemInterface $item): MenuEvent
    {
        if ($item instanceof MenuItemInterface && isset($this->menuRootItems[$item->getIdentifier()])) {
            unset($this->menuRootItems[$item->getIdentifier()]);
        } elseif (\is_string($item) && isset($this->menuRootItems[$item])) {
            unset($this->menuRootItems[$item]);
        }

        return $this;
    }

    /**
     * @param string $id
     * @return MenuItemInterface|MenuItem|null
     */
    public function getRootItem(string $id): MenuItem|MenuItemInterface|null
    {
        return $this->menuRootItems[$id] ?? null;
    }

    /**
     * @return MenuItemInterface|MenuItem|null
     */
    public function getActive(): MenuItem|MenuItemInterface|null
    {
        foreach ($this->getItems() as $item) {
            if ($item->isActive()) {
                return $item;
            }
        }

        return null;
    }
}
