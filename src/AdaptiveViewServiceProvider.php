<?php

namespace DigitLab\AdaptiveView;

use DigitLab\AdaptiveView\Browser\AgentBrowserAdapter;
use DigitLab\AdaptiveView\Browser\Browser;
use Illuminate\View\ViewServiceProvider;

class AdaptiveViewServiceProvider extends ViewServiceProvider
{
    public function register()
    {
        $this->registerBrowser();

        parent::register();
    }

    public function registerBrowser()
    {
        $browser = $this->app['config']['view.browser'];
        if (!$browser) {
            $browser = AgentBrowserAdapter::class;
        }

        $this->app->bind(Browser::class, $browser);
    }

    public function registerViewFinder()
    {
        $this->app->bind('view.finder', function ($app) {
            $browser = $app->make(Browser::class);
            $paths = $app['config']['view.paths'];

            return new AdaptiveFileViewFinder($browser, $app['files'], $paths);
        });
    }
}
