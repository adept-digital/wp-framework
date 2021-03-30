<?php

namespace AdeptDigital\WpFramework\ServiceProvider;

/**
 * Assets Service Provider
 */
abstract class AbstractAssetsServiceProvider extends AbstractServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register(): void
    {
        // noop
    }

    /**
     * @inheritDoc
     */
    public function boot(): void
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueuePublicAssets']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueAdminAssets']);
    }

    /**
     * Enqueue assets for the public site
     *
     * Example:
     * ```php
     * wp_enqueue_style(
     *   $this->component->getNamespace('app'),
     *   $this->component->getUri('/assets/css/app.css')
     * );
     * ```
     *
     * @return void
     * @see wp_enqueue_style()
     * @see wp_enqueue_script()
     */
    abstract public function enqueuePublicAssets(): void;

    /**
     * Enqueue assets for the WordPress admin
     *
     * Example:
     * ```php
     * wp_enqueue_style(
     *   $this->component->getNamespace('app'),
     *   $this->component->getUri('/assets/css/app.css')
     * );
     * ```
     *
     * @return void
     * @see wp_enqueue_style()
     * @see wp_enqueue_script()
     */
    abstract public function enqueueAdminAssets(): void;
}