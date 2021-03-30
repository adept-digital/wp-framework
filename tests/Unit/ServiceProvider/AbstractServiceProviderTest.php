<?php

namespace AdeptDigital\WpFramework\Tests\Unit\ServiceProvider;


use AdeptDigital\WpFramework\ServiceProvider\AbstractServiceProvider;
use League\Container\Container;
use PHPUnit\Framework\TestCase;

class AbstractServiceProviderTest extends TestCase
{
    public function testSetGetContainer()
    {
        $provider = $this->getMockForAbstractClass(AbstractServiceProvider::class);
        $container = new Container();
        $provider->setContainer($container);
        $this->assertSame($container, $provider->getContainer());
    }
}