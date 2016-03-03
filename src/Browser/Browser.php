<?php

namespace DigitLab\AdaptiveView\Browser;

interface Browser
{
    /**
     * Determines if the browser is a mobile browser.
     *
     * @return bool
     */
    function isMobile();

    /**
     * Determines if the browser is a tablet browser.
     *
     * @return bool
     */
    function isTablet();
}