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
    public function getAvatar(): ?string;

    public function getUsername(): string;

    public function getName(): string;

    public function getMemberSince(): ?\DateTimeInterface;

    public function isOnline(): bool;

    public function getIdentifier(): string;

    public function getTitle(): string;
}
