<?php

namespace AdeptDigital\WpFramework\Component;

use AdeptDigital\WpBaseTheme\AbstractTheme as BaseTheme;
use AdeptDigital\WpFramework\Container\HasContainerInterface;

/**
 * Abstract Theme
 */
abstract class AbstractTheme extends BaseTheme implements HasContainerInterface
{
    use ComponentTrait;
}