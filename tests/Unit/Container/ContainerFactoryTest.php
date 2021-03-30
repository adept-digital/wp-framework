<?php

namespace AdeptDigital\WpFramework\Tests\Container;

use AdeptDigital\WpFramework\Container\ContainerFactory;
use League\Container\Container;
use PHPUnit\Framework\TestCase;

class ContainerFactoryTest extends TestCase
{
    public function testCreate()
    {
        $factory = new ContainerFactory();
        $container1 = $factory->create();
        $container2 = $factory->create();
        $this->assertInstanceOf(Container::class, $container1);
        $this->assertInstanceOf(Container::class, $container2);
        $this->assertNotSame($container1, $container2);
    }

    public function testSetIsCacheResolutions()
    {
        $factory = new ContainerFactory();
        $factory->setIsCacheResolutions(true);
        $container1 = $factory->create();
        $container2 = $factory->create();
        $this->assertEquals($container1, $container2);

        $factory->setIsCacheResolutions(false);
        $container3 = $factory->create();
        $this->assertNotEquals($container1, $container3);
    }

    public function testSetIsDefaultShared()
    {
        $factory = new ContainerFactory();
        $factory->setIsDefaultShared(true);
        $container1 = $factory->create();
        $container2 = $factory->create();
        $this->assertEquals($container1, $container2);

        $factory->setIsDefaultShared(false);
        $container3 = $factory->create();
        $this->assertNotEquals($container1, $container3);
    }

    public function testSetIsAutoWiring()
    {
        $factory = new ContainerFactory();
        $factory->setIsAutoWiring(true);
        $container1 = $factory->create();
        $container2 = $factory->create();
        $this->assertEquals($container1, $container2);

        $factory->setIsAutoWiring(false);
        $container3 = $factory->create();
        $this->assertNotEquals($container1, $container3);
    }
}
