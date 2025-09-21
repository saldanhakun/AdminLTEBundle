<?php

/*
 * This file is part of the AdminLTE bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\AdminLTEBundle\Model;

use KevinPapst\AdminLTEBundle\Helper\Constants;

class NotificationModel implements NotificationInterface
{
    /**
     * @var string
     */
    protected string $type = Constants::TYPE_INFO;
    /**
     * @var string|null
     */
    protected ?string $message;
    /**
     * @var string
     */
    protected string $icon;
    /**
     * @var string
     */
    protected string $id;

    /**
     * @param string|null $message
     * @param string $type
     * @param string $icon
     */
    public function __construct(?string $message = null, string $type = Constants::TYPE_INFO, string $icon = 'fas fa-exclamation-triangle')
    {
        $this->message = $message;
        $this->type = $type;
        $this->icon = $icon;
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
     * @return NotificationModel
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $message
     *
     * @return NotificationModel
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $type
     *
     * @return NotificationModel
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $icon
     *
     * @return NotificationModel
     */
    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        if (!empty($this->id)) {
            return $this->id;
        }

        return $this->message;
    }
}
