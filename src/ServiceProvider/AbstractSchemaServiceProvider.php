<?php

namespace AdeptDigital\WpFramework\ServiceProvider;

/**
 * Assets Schema Provider
 */
abstract class AbstractSchemaServiceProvider extends AbstractServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register(): void
    {
        // Nothing to register.
    }

    /**
     * @inheritDoc
     */
    public function boot(): void
    {
        add_action('init', [$this, 'registerPostTypes']);
        add_action('init', [$this, 'registerTaxonomies']);
    }

    /**
     * Register custom post types
     *
     * Example:
     * ```php
     * register_post_type(
     *   $this->component->getNamespace('book'), // be aware name cannot exceed 20 characters
     *   [
     *     'labels' => [
     *       'name' => 'Books',
     *       'singular_name' => 'Book',
     *     ],
     *     'public' => true,
     *     'taxonomies' => [$this->component->getNamespace('genre')]
     *   ]
     * );
     * ```
     *
     * @return void
     * @see register_post_type()
     * @see https://developer.wordpress.org/reference/functions/register_post_type/
     */
    public function registerPostTypes(): void
    {

    }

    /**
     * Register custom taxonomies
     *
     * Example:
     * ```php
     * register_taxonomy(
     *   $this->component->getNamespace('genre'), // be aware name cannot exceed 32 characters
     *   $this->component->getNamespace('book'),
     *   [
     *     'labels' => [
     *       'name' => 'Genres',
     *       'singular_name' => 'Genre',
     *     ],
     *     'public' => true,
     *   ]
     * );
     * ```
     *
     * @return void
     * @see register_taxonomy()
     * @see https://developer.wordpress.org/reference/functions/register_taxonomy/
     */
    abstract public function registerTaxonomies(): void;
}