<?php

/*
 * This file is part of the AdminLTE bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\AdminLTEBundle\Event;

use KevinPapst\AdminLTEBundle\Model\MessageInterface;
use KevinPapst\AdminLTEBundle\Repository\MessageRepositoryInterface;

/**
 * The MessageListEvent collects all MessageInterface objects that should be rendered in the messages section.
 */
class MessageListEvent extends ThemeEvent implements MessageRepositoryInterface
{
    /**
     * Stores the list of messages
     *
     * @var array
     */
    protected array $messages = [];

    /**
     * Stores the total amount
     *
     * @var int
     */
    protected int $totalMessages = 0;

    /**
     * @var int|null
     */
    protected ?int $max = null;

    /**
     * @param int|null $max Maximum number of messages displayed in panel
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
     * Returns the message list
     *
     * @return array
     */
    public function getMessages(): array
    {
        if (null !== $this->max) {
            return \array_slice($this->messages, 0, $this->max);
        }

        return $this->messages;
    }

    /**
     * Pushes the given message to the list of messages.
     *
     * @param MessageInterface $messageInterface
     *
     * @return $this
     */
    public function addMessage(MessageInterface $messageInterface): static
    {
        $this->messages[] = $messageInterface;

        return $this;
    }

    /**
     * Returns the message count
     *
     * @return int
     */
    public function getTotal(): int
    {
        return $this->totalMessages === 0 ? \count($this->messages) : $this->totalMessages;
    }

    /**
     * @param int $totalMessages
     */
    public function setTotal(int $totalMessages): void
    {
        $this->totalMessages = $totalMessages;
    }
}
