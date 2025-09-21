<?php

/*
 * This file is part of the AdminLTE bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\AdminLTEBundle\Model;

use KevinPapst\AdminLTEBundle\Helper\Constants;

class TaskModel implements TaskInterface
{
    /**
     * @var int
     */
    protected int $progress;

    /**
     * @var string
     */
    protected string $color = Constants::COLOR_AQUA;

    /**
     * @var string|null
     */
    protected ?string $title;

    /**
     * @var string
     */
    protected string $id;

    /**
     * @param string|null $title
     * @param int $progress
     * @param string $color
     */
    public function __construct(?string $title = null, int $progress = 0, string $color = Constants::COLOR_AQUA)
    {
        $this->title = $title;
        $this->progress = $progress;
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return TaskModel
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $color
     *
     * @return TaskModel
     */
    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param int $progress
     *
     * @return TaskModel
     */
    public function setProgress(int $progress): self
    {
        $this->progress = $progress;

        return $this;
    }

    /**
     * @return int
     */
    public function getProgress(): int
    {
        return $this->progress;
    }

    /**
     * @param string $title
     *
     * @return TaskModel
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        if (!empty($this->id)) {
            return $this->id;
        }

        return $this->title;
    }
}
