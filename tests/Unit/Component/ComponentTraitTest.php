<?php

namespace AdeptDigital\WpFramework\Tests\Component;

use AdeptDigital\WpBaseComponent\AbstractComponent;
use AdeptDigital\WpBaseComponent\ComponentInterface;
use AdeptDigital\WpFramework\Component\ComponentTrait;
use AdeptDigital\WpFramework\Container\ContainerFactoryInterface;
use League\Container\Container;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ComponentTraitTest extends TestCase
{
    /**
     * @param array $mockedMethods
     * @return ComponentTrait|MockObject
     */
    private function createComponent(array $mockedMethods = []): MockObject
    {
        return $this->getMockBuilder(_Component::class)
            ->setConstructorArgs(['abc', 'file.php'])
            ->onlyMethods($mockedMethods)
            ->getMockForAbstractClass();
    }

    private function createMockContainerFactory(): ContainerFactoryInterface
    {
        return new class implements ContainerFactoryInterface {
            private Container $container;

            public function create(): Container
            {
                if (!isset($this->container)) {
                    $this->container = new Container();
                }

                return $this->container;
            }
        };
    }

    public function testGetContainer()
    {
        $component = $this->createComponent(['getContainerFactory']);
        $factory = $this->createMockContainerFactory();
        $component->expects(self::once())
            ->method('getContainerFactory')
            ->willReturn($factory);

        $this->assertSame($factory->create(), $component->getContainer());

        $container = $component->getContainer();
        $this->assertSame($component, $container->get(ComponentInterface::class));
    }

    public function testGetContainerFactory()
    {
        $component = $this->createComponent();
        $this->assertInstanceOf(ContainerFactoryInterface::class, $component->getContainerFactory());
    }

    public function testSetGetContainerFactory()
    {
        $component = $this->createComponent();
        $factory = $this->createMockContainerFactory();
        $component->setContainerFactory($factory);
        $this->assertSame($factory, $component->getContainerFactory());
    }
}

abstract class _Component extends AbstractComponent implements ComponentInterface
{
    use ComponentTrait {
        getContainerFactory as public;
        setContainerFactory as public;
    }
}