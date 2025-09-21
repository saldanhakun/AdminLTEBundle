<?php

/*
 * This file is part of the AdminLTE bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\AdminLTEBundle\Model;

class NavBarUserLink
{
    /**
     * @var string
     */
    protected string $title;
    /**
     * @var string
     */
    protected string $path;
    /**
     * @var array
     */
    protected array $parameters;

    /**
     * @param string $title
     * @param string $path
     * @param array $parameters
     */
    public function __construct(string $title, string $path, array $parameters = [])
    {
        $this->title = $title;
        $this->path = $path;
        $this->parameters = $parameters;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     */
    public function setParameters(array $parameters): void
    {
        $this->parameters = $parameters;
    }
}
