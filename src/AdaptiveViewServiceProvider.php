<?php

namespace DigitLab\AdaptiveView;

use DigitLab\AdaptiveView\Browser\AgentBrowserAdapter;
use DigitLab\AdaptiveView\Browser\Browser;
use Illuminate\Support\ServiceProvider;

class AdaptiveViewServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBrowser();

        $this->registerViewFinder();
    }

    /**
     * Register the browser implementation.
     *
     * @return void
     */
    public function registerBrowser()
    {
        $browser = $this->app['config']['view.browser'];
        if (!$browser) {
            $browser = AgentBrowserAdapter::class;
        }

        $this->app->bind(Browser::class, $browser);
    }

    /**
     * Register the view finder implementation.
     *
     * @return void
     */
    public function registerViewFinder()
    {
        $this->app->bind('view.finder', function ($app) {
            $browser = $app->make(Browser::class);
            $paths = $app['config']['view.paths'];

            return new AdaptiveFileViewFinder($browser, $app['files'], $paths);
        });
    }
}
