<?php

namespace AdeptDigital\WpFramework\Component;

use AdeptDigital\WpBasePlugin\AbstractPlugin as BasePlugin;
use AdeptDigital\WpFramework\Container\HasContainerInterface;

/**
 * Abstract Plugin
 */
abstract class AbstractPlugin extends BasePlugin implements HasContainerInterface
{
    use ComponentTrait;
}