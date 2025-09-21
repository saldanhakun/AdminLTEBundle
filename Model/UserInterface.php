<?php

/*
 * This file is part of the AdminLTE bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\AdminLTEBundle\Model;

interface UserInterface
{
    /**
     * @return string
     */
    public function getAvatar(): string;

    /**
     * @return string
     */
    public function getUsername(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return \DateTime
     */
    public function getMemberSince(): \DateTime;

    /**
     * @return bool
     */
    public function isOnline(): bool;

    /**
     * @return string
     */
    public function getIdentifier(): string;

    /**
     * @return string
     */
    public function getTitle(): string;
}
