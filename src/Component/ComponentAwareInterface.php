<?php

namespace AdeptDigital\WpFramework\Component;

use AdeptDigital\WpBaseComponent\ComponentInterface;

/**
 * Component Aware Interface
 */
interface ComponentAwareInterface
{
    /**
     * Set the component
     *
     * @param ComponentInterface $component
     * @return void
     */
    public function setComponent(ComponentInterface $component): void;
}