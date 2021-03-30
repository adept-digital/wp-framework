<?php

namespace AdeptDigital\WpFramework\Component;

use AdeptDigital\WpBaseComponent\ComponentInterface;

/**
 * Component Aware Trait
 *
 * @psalm-require-implements ComponentAwareInterface
 */
trait ComponentAwareTrait
{
    /**
     * The component instance
     *
     * @var ComponentInterface
     */
    protected ComponentInterface $component;

    /**
     * @inheritDoc
     */
    public function setComponent(ComponentInterface $component): void
    {
        $this->component = $component;
    }

    /**
     * Get the component
     *
     * @return ComponentInterface
     * @internal
     */
    public function getComponent(): ComponentInterface
    {
        return $this->component;
    }
}