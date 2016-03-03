<?php

namespace DigitLab\AdaptiveView\Browser;

interface Browser
{
    /**
     * Determines if the browser is a mobile browser.
     *
     * @return bool
     */
    public function isMobile();

    /**
     * Determines if the browser is a tablet browser.
     *
     * @return bool
     */
    public function isTablet();
}
