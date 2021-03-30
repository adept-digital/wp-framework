<?php

namespace AdeptDigital\WpFramework\Container;

use League\Container\Container;

/**
 * Has Container Interface
 */
interface HasContainerInterface
{
    /**
     * Get the container.
     *
     * If calling this method from outside of the component, you should
     * type hint on {@see \Psr\Container\ContainerInterface}.
     *
     * @return Container
     */
    public function getContainer(): Container;
}