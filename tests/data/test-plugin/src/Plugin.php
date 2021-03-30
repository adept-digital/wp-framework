<?php

namespace AdeptDigital\WpFramework\TestPlugin;

use AdeptDigital\WpBasePlugin\AbstractPlugin;
use AdeptDigital\WpFramework\Component\ComponentInterface;
use AdeptDigital\WpFramework\Component\ComponentTrait;
use AdeptDigital\WpFramework\TestPlugin\ServiceProvider\TestServiceProvider;
use League\Container\Container;

class Plugin extends AbstractPlugin implements ComponentInterface
{
    use ComponentTrait;

    protected function services(Container $container): void
    {
        $container->add('test-key', 'test-value');
        $container->addServiceProvider(TestServiceProvider::class);
    }
}