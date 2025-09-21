<?php

/*
 * This file is part of the AdminLTE bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\AdminLTEBundle\Model;

class MessageModel implements MessageInterface
{
    /**
     * @var UserInterface|null
     */
    protected ?UserInterface $from;
    /**
     * @var UserInterface|null
     */
    protected ?UserInterface $to;
    /**
     * @var \DateTime
     */
    protected \DateTime $sentAt;
    /**
     * @var string
     */
    protected string $subject;
    /**
     * @var string
     */
    protected string $id;

    /**
     * Creates a new MessageModel object with the given values.
     *
     * SentAt will be set to the current DateTime when null is given.
     *
     * @param UserInterface|null $from
     * @param string $subject
     * @param \DateTime|null $sentAt
     * @param UserInterface|null $to
     */
    public function __construct(?UserInterface $from = null, string $subject = '', ?\DateTime $sentAt = null, ?UserInterface $to = null)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->sentAt = $sentAt ?: new \DateTime();
        $this->from = $from;
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
     * @return MessageModel
     */
    public function setId(string $id): MessageModel
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the sender
     *
     * @param UserInterface $from
     * @return $this
     */
    public function setFrom(UserInterface $from): MessageModel
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get the Sender
     *
     * @return UserInterface
     */
    public function getFrom(): UserInterface
    {
        return $this->from;
    }

    /**
     * Set the date sent
     *
     * @param \DateTime $sentAt
     *
     * @return $this
     */
    public function setSentAt(\DateTime $sentAt): MessageModel
    {
        $this->sentAt = $sentAt;

        return $this;
    }

    /**
     * Get the date sent
     *
     * @return \DateTime
     */
    public function getSentAt(): \DateTime
    {
        return $this->sentAt;
    }

    /**
     * Set the subject
     *
     * @param string $subject
     * @return $this
     */
    public function setSubject(string $subject): MessageModel
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get the subject
     *
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * Set the recipient
     *
     * @param UserInterface $to
     * @return $this
     */
    public function setTo(UserInterface $to): MessageModel
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get the recipient
     *
     * @return UserInterface|null
     */
    public function getTo(): ?UserInterface
    {
        return $this->to;
    }

    /**
     * Get the identifier
     *
     * @return string
     */
    public function getIdentifier(): string
    {
        if (!empty($this->id)) {
            return $this->id;
        }

        return $this->getSubject();
    }
}
