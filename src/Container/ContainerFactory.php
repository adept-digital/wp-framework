<?php

namespace AdeptDigital\WpFramework\Container;

use AdeptDigital\WpBaseComponent\ComponentInterface;
use AdeptDigital\WpFramework\Component\ComponentAwareInterface;
use League\Container\Container;
use League\Container\ReflectionContainer;

/**
 * Container Factory
 */
class ContainerFactory implements ContainerFactoryInterface
{
    /**
     * Is the factory creating container with auto wiring?
     *
     * @var bool
     */
    private bool $isAutoWiring = true;

    /**
     * Is the factory creating container with shared definitions?
     *
     * @var bool
     */
    private bool $isDefaultShared = true;

    /**
     * Is the factory creating container with cached auto wiring resolutions?
     *
     * @var bool
     */
    private bool $isCacheResolutions = true;

    /**
     * @inheritDoc
     */
    public function create(): Container
    {
        $container = new Container();
        $container->defaultToShared($this->isDefaultShared);

        if ($this->isAutoWiring) {
            $reflectionContainer = new ReflectionContainer();
            $reflectionContainer->cacheResolutions($this->isCacheResolutions);
            $container->delegate($reflectionContainer);
        }

        $container
            ->inflector(ComponentAwareInterface::class)
            ->invokeMethod('setComponent', [ComponentInterface::class]);

        return $container;
    }

    /**
     * Is the factory creating container with auto wiring?
     *
     * @param bool $isAutoWiring
     * @return void
     */
    public function setIsAutoWiring(bool $isAutoWiring): void
    {
        $this->isAutoWiring = $isAutoWiring;
    }

    /**
     * Is the factory creating container with shared definitions?
     *
     * @param bool $isDefaultShared
     * @return void
     */
    public function setIsDefaultShared(bool $isDefaultShared): void
    {
        $this->isDefaultShared = $isDefaultShared;
    }

    /**
     * Is the factory creating container with cached auto wiring resolutions?
     *
     * @param bool $isCacheResolutions
     * @return void
     */
    public function setIsCacheResolutions(bool $isCacheResolutions): void
    {
        $this->isCacheResolutions = $isCacheResolutions;
    }
}