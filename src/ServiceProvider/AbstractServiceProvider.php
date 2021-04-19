<?php

namespace AdeptDigital\WpFramework\ServiceProvider;

use AdeptDigital\WpFramework\Component\ComponentAwareInterface;
use AdeptDigital\WpFramework\Component\ComponentAwareTrait;
use AdeptDigital\WpFramework\Container\HasContainerInterface;
use InvalidArgumentException;
use League\Container\Container;
use League\Container\ContainerAwareInterface;
use League\Container\ServiceProvider\AbstractServiceProvider as BaseServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Psr\Container\ContainerInterface;

/**
 * Base Service Provider
 */
abstract class AbstractServiceProvider extends BaseServiceProvider implements
    BootableServiceProviderInterface,
    ComponentAwareInterface,
    HasContainerInterface
{
    use ComponentAwareTrait;

    /**
     * {@inheritDoc}
     *
     * @return Container
     */
    public function getContainer(): ContainerInterface
    {
        return parent::getLeagueContainer();
    }

    /**
     * {@inheritDoc}
     *
     * @param Container $container
     * @return $this
     */
    public function setContainer(ContainerInterface $container): ContainerAwareInterface
    {
        if (!($container instanceof Container)) {
            throw new InvalidArgumentException('Container must be an instance of ' . Container::class);
        }

        return parent::setLeagueContainer($container);
    }

    /**
     * @inheritDoc
     * @deprecated Use {@see getContainer()}
     * @internal For use by League Container
     */
    public function getLeagueContainer(): Container
    {
        return $this->getContainer();
    }

    /**
     * @inheritDoc
     * @deprecated Use {@see setContainer()}
     * @internal For use by League Container
     */
    public function setLeagueContainer(Container $container): ContainerAwareInterface
    {
        return $this->setContainer($container);
    }
}