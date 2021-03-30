<?php

namespace AdeptDigital\WpFramework\Container;

use League\Container\Container;

/**
 * Container Factory Interface
 */
interface ContainerFactoryInterface
{
    /**
     * Create a container.
     *
     * @return Container
     */
    public function create(): Container;
}