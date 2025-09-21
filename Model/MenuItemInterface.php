<?php

/*
 * This file is part of the AdminLTE bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\AdminLTEBundle\Model;

/**
 * Interface MenuItemInterface
 */
interface MenuItemInterface
{
    /**
     * @return string
     */
    public function getIdentifier(): string;

    /**
     * @return string
     */
    public function getLabel(): string;

    /**
     * @return string
     */
    public function getRoute(): string;

    /**
     * @return bool
     */
    public function isActive(): bool;

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive);

    /**
     * @return bool
     */
    public function hasChildren(): bool;

    /**
     * @return array
     */
    public function getChildren(): array;

    /**
     * @param MenuItemInterface $child
     */
    public function addChild(MenuItemInterface $child);

    /**
     * @param MenuItemInterface $child
     */
    public function removeChild(MenuItemInterface $child);

    /**
     * @return string
     */
    public function getIcon(): string;

    /**
     * @return string
     */
    public function getBadge(): string;

    /**
     * @return string
     */
    public function getBadgeColor(): string;

    /**
     * @return MenuItemInterface
     */
    public function getParent(): MenuItemInterface;

    /**
     * @return bool
     */
    public function hasParent(): bool;

    /**
     * @param ?MenuItemInterface $parent
     */
    public function setParent(?MenuItemInterface $parent = null);

    /**
     * @return MenuItemInterface|null
     */
    public function getActiveChild(): ?MenuItemInterface;
}
