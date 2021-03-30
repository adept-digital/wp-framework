<?php

namespace AdeptDigital\WpFramework\Component;

use AdeptDigital\WpBaseComponent\ComponentInterface;
use AdeptDigital\WpFramework\Container\ContainerFactory;
use AdeptDigital\WpFramework\Container\ContainerFactoryInterface;
use League\Container\Argument\RawArgument;
use League\Container\Container;
use League\Container\Definition\Definition;

/**
 * Component Trait
 *
 * @psalm-require-implements \AdeptDigital\WpBaseComponent\ComponentInterface
 */
trait ComponentTrait
{
    /**
     * Container for this component.
     *
     * @var Container
     */
    private Container $container;

    /**
     * Container Factory.
     *
     * @var ContainerFactoryInterface
     */
    private ContainerFactoryInterface $containerFactory;

    /**
     * @inheritDoc
     */
    public function getContainer(): Container
    {
        if (!isset($this->container)) {
            $this->container = $this->getContainerFactory()->create();
            if ($this instanceof ComponentInterface) {
                $this->container->add(
                    ComponentInterface::class,
                    new RawArgument($this)
                );
            }
        }

        return $this->container;
    }

    /**
     * Get the container factory.
     *
     * @return ContainerFactoryInterface
     */
    protected function getContainerFactory(): ContainerFactoryInterface
    {
        if (!isset($this->containerFactory)) {
            $this->containerFactory = new ContainerFactory();
        }

        return $this->containerFactory;
    }

    /**
     * Set the container factory.
     *
     * @param ContainerFactoryInterface $containerFactory
     */
    protected function setContainerFactory(ContainerFactoryInterface $containerFactory): void
    {
        $this->containerFactory = $containerFactory;
    }
}