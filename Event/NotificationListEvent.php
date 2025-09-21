<?php

/*
 * This file is part of the AdminLTE bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\AdminLTEBundle\Event;

use KevinPapst\AdminLTEBundle\Model\NotificationInterface;
use KevinPapst\AdminLTEBundle\Repository\NotificationRepositoryInterface;

/**
 * The NotificationListEvent collects all NotificationInterface objects that should be rendered in the notification section.
 */
class NotificationListEvent extends ThemeEvent implements NotificationRepositoryInterface
{
    /**
     * @var array
     */
    protected array $notifications = [];

    /**
     * @var int
     */
    protected int $total = 0;

    /**
     * @var int|null
     */
    protected ?int $max = null;

    /**
     * @param int|null $max Maximum number of notifications displayed in panel
     */
    public function __construct(?int $max = null)
    {
        $this->max = $max;
    }

    /**
     * Get the maximum number of notifications displayed in panel
     *
     * @return int|null
     */
    public function getMax(): ?int
    {
        return $this->max;
    }

    /**
     * @return array
     */
    public function getNotifications(): array
    {
        if (null !== $this->max) {
            return \array_slice($this->notifications, 0, $this->max);
        }

        return $this->notifications;
    }

    /**
     * @param NotificationInterface $notificationInterface
     *
     * @return $this
     */
    public function addNotification(NotificationInterface $notificationInterface): static
    {
        $this->notifications[] = $notificationInterface;

        return $this;
    }

    /**
     * @param int $total
     */
    public function setTotal(int $total): void
    {
        $this->total = $total;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total === 0 ? \count($this->notifications) : $this->total;
    }
}
