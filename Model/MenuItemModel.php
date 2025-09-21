<?php

/*
 * This file is part of the AdminLTE bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\AdminLTEBundle\Model;

/**
 * Class MenuItemModel
 */
class MenuItemModel implements MenuItemInterface
{
    /**
     * @var string
     */
    protected string $identifier;

    /**
     * @var string
     */
    protected string $label;

    /**
     * @var string
     */
    protected string $route;

    /**
     * @var array
     */
    protected array $routeArgs = [];
    /**
     * @var bool
     */
    protected bool $isActive = false;
    /**
     * @var array
     */
    protected array $children = [];

    /**
     * @var mixed
     */
    protected mixed $icon = false;

    /**
     * @var mixed
     */
    protected mixed $badge = false;

    /**
     * @var string
     */
    protected string $badgeColor = 'green';

    /**
     * @var MenuItemInterface|null
     */
    protected ?MenuItemInterface $parent = null;

    /**
     * @param string $id
     * @param string $label
     * @param string $route
     * @param array $routeArgs
     * @param false|mixed $icon
     * @param false|mixed $badge
     * @param string $badgeColor
     */
    public function __construct(
        string $id,
        string $label,
        string $route,
        array $routeArgs = [],
        mixed $icon = false,
        mixed $badge = false,
        string $badgeColor = 'green'
    ) {
        $this->badge = $badge;
        $this->icon = $icon;
        $this->identifier = $id;
        $this->label = $label;
        $this->route = $route;
        $this->routeArgs = $routeArgs;
        $this->badgeColor = $badgeColor;
    }

    /**
     * @return string
     */
    public function getBadge(): string
    {
        return $this->badge;
    }

    /**
     * @param mixed $badge
     *
     * @return $this
     */
    public function setBadge(mixed $badge): static
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * @return array
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @param array $children
     */
    public function setChildren(array $children): void
    {
        $this->children = $children;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     *
     * @return $this
     */
    public function setIcon(mixed $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     *
     * @return $this
     */
    public function setIdentifier(string $identifier): static
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     *
     * @return $this
     */
    public function setIsActive(bool $isActive): static
    {
        if ($this->hasParent()) {
            $this->getParent()->setIsActive($isActive);
        }

        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasParent(): bool
    {
        return $this->parent instanceof MenuItemInterface;
    }

    /**
     * @return MenuItemInterface
     */
    public function getParent(): MenuItemInterface
    {
        return $this->parent;
    }

    /**
     * @param MenuItemInterface|null $parent
     *
     * @return $this
     */
    public function setParent(?MenuItemInterface $parent = null): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     *
     * @return $this
     */
    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * @param string $route
     *
     * @return $this
     */
    public function setRoute(string $route): static
    {
        $this->route = $route;

        return $this;
    }

    /**
     * @return array
     */
    public function getRouteArgs(): array
    {
        return $this->routeArgs;
    }

    /**
     * @param array $routeArgs
     *
     * @return $this
     */
    public function setRouteArgs(array $routeArgs): static
    {
        $this->routeArgs = $routeArgs;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasChildren(): bool
    {
        return \count($this->children) > 0;
    }

    /**
     * @param MenuItemInterface $child
     *
     * @return $this
     */
    public function addChild(MenuItemInterface $child): static
    {
        $child->setParent($this);
        $this->children[] = $child;

        return $this;
    }

    /**
     * @param MenuItemInterface $child
     *
     * @return $this
     */
    public function removeChild(MenuItemInterface $child): static
    {
        if (false !== ($key = array_search($child, $this->children))) {
            unset($this->children[$key]);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getBadgeColor(): string
    {
        return $this->badgeColor;
    }

    /**
     * @param string $badgeColor
     *
     * @return $this
     */
    public function setBadgeColor(string $badgeColor): static
    {
        $this->badgeColor = $badgeColor;

        return $this;
    }

    /**
     * @return MenuItemInterface|null
     */
    public function getActiveChild(): ?MenuItemInterface
    {
        foreach ($this->children as $child) {
            if ($child->isActive()) {
                return $child;
            }
        }

        return null;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }
}
