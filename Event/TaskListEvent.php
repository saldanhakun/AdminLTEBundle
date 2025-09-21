<?php

/*
 * This file is part of the AdminLTE bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\AdminLTEBundle\Event;

use KevinPapst\AdminLTEBundle\Model\TaskInterface;
use KevinPapst\AdminLTEBundle\Repository\TaskRepositoryInterface;

/**
 * The TaskListEvent collects all TaskInterface objects that should be rendered in the tasks section.
 */
class TaskListEvent extends ThemeEvent implements TaskRepositoryInterface
{
    /**
     * @var TaskInterface[]
     */
    protected array $tasks = [];

    /**
     * @var int|null
     */
    protected ?int $max;

    /**
     * @var int
     */
    protected int $total = 0;

    /**
     * @param int|null $max Maximum number of tasks displayed in panel
     */
    public function __construct(?int $max = null)
    {
        $this->max = $max;
    }

    /**
     * Get the maximun number of notifications displayed in panel
     *
     * @return int
     */
    public function getMax(): ?int
    {
        return $this->max;
    }

    /**
     * @return TaskInterface[]
     */
    public function getTasks(): array
    {
        if (null !== $this->max) {
            return \array_slice($this->tasks, 0, $this->max);
        }

        return $this->tasks;
    }

    /**
     * @param TaskInterface $taskInterface
     *
     * @return $this
     */
    public function addTask(TaskInterface $taskInterface): static
    {
        $this->tasks[] = $taskInterface;

        return $this;
    }

    /**
     * @param int $total
     *
     * @return $this
     */
    public function setTotal(int $total): static
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total === 0 ? \count($this->tasks) : $this->total;
    }
}
