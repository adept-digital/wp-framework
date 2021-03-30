<?php

namespace AdeptDigital\WpFramework\TestPlugin\ServiceProvider;

use AdeptDigital\WpFramework\ServiceProvider\AbstractServiceProvider;

class TestServiceProvider extends AbstractServiceProvider
{

    public function boot()
    {
        $this->getLeagueContainer()->add();
    }

    public function register()
    {
        // TODO: Implement register() method.
    }
}