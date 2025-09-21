<?php

/*
 * This file is part of the AdminLTE bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\AdminLTEBundle\Model;

class UserModel implements UserInterface
{
    /**
     * @var string
     */
    protected string $avatar;

    /**
     * @var string
     */
    protected string $username;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var string
     */
    protected string $title;

    /**
     * @var \DateTime
     */
    protected \DateTime $memberSince;

    /**
     * @var bool
     */
    protected bool $isOnline = false;

    /**
     * @var string
     */
    protected string $id;

    /**
     * @param string $username
     * @param string $avatar
     * @param \DateTime|null $memberSince
     * @param bool $isOnline
     * @param string $name
     * @param string $title
     */
    public function __construct(string $username = '', string $avatar = '', ?\DateTime $memberSince = null, bool $isOnline = true, string $name = '', string $title = '')
    {
        $this->username = $username;
        $this->avatar = $avatar;
        $this->memberSince = $memberSince ?: new \DateTime();
        $this->isOnline = $isOnline;
        $this->name = $name;
        $this->title = $title;
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
     * @return UserModel
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $avatar
     *
     * @return $this
     */
    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @param bool $isOnline
     *
     * @return $this
     */
    public function setIsOnline(bool $isOnline): self
    {
        $this->isOnline = $isOnline;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsOnline(): bool
    {
        return $this->isOnline;
    }

    /**
     * @param \DateTime $memberSince
     *
     * @return $this
     */
    public function setMemberSince(\DateTime $memberSince): self
    {
        $this->memberSince = $memberSince;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getMemberSince(): \DateTime
    {
        return $this->memberSince;
    }

    /**
     * @param string $username
     *
     * @return $this
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $title
     *
     * @return $this
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
     * @return bool
     */
    public function isOnline(): bool
    {
        return $this->getIsOnline();
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        if (!empty($this->id)) {
            return $this->id;
        }

        return str_replace(' ', '-', $this->getUsername());
    }
}
