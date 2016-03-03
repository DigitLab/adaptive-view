<?php

namespace DigitLab\AdaptiveView\Browser;

use Jenssegers\Agent\Agent;

class AgentBrowserAdapter implements Browser
{
    /**
     * @var \Jenssegers\Agent\Agent
     */
    private $agent;

    function __construct(Agent $agent)
    {
        $this->agent = $agent;
    }

    /**
     * Determines if the browser is a mobile browser.
     *
     * @return bool
     */
    function isMobile()
    {
        return $this->agent->isMobile();
    }

    /**
     * Determines if the browser is a tablet browser.
     *
     * @return bool
     */
    function isTablet()
    {
        return $this->agent->isTablet();
    }
}