<?php

namespace DigitLab\AdaptiveView;

use DigitLab\AdaptiveView\Browser\Browser;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\FileViewFinder;

class AdaptiveFileViewFinder extends FileViewFinder
{
    /**
     * @var \DigitLab\AdaptiveView\Browser\Browser
     */
    private $browser;

    /**
     * Register a mobile view extension with the finder.
     *
     * @var array
     */
    protected $mobileExtensions = ['mobile.blade.php'];

    /**
     * Register a tablet view extension with the finder.
     *
     * @var array
     */
    protected $tabletExtensions = ['tablet.blade.php'];

    /**
     * Create a new file view loader instance.
     *
     * @param  \DigitLab\AdaptiveView\Browser\Browser $browser
     * @param  \Illuminate\Filesystem\Filesystem $files
     * @param  array $paths
     * @param  array $extensions
     * @param  array $mobileExtensions
     */
    public function __construct(Browser $browser, Filesystem $files, array $paths, array $extensions = null, array $mobileExtensions = null)
    {
        parent::__construct($files, $paths, $extensions);

        $this->browser = $browser;

        if (isset($mobileExtensions)) {
            $this->mobileExtensions = $mobileExtensions;
        }
    }

    /**
     * Get an array of possible view files.
     *
     * @param  string  $name
     * @return array
     */
    protected function getPossibleViewFiles($name)
    {
        $extensions = $this->extensions;

        if ($this->browser->isMobile()) {
            $extensions = array_merge($this->mobileExtensions, $extensions);
        } else if ($this->browser->isTablet()) {
            $extensions = array_merge($this->tabletExtensions, $extensions);
        }

        return array_map(function ($extension) use ($name) {
            return str_replace('.', '/', $name).'.'.$extension;

        }, $extensions);
    }

    /**
     * Get the browser instance.
     *
     * @return \DigitLab\AdaptiveView\Browser\Browser
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * Register a mobile extension with the view finder.
     *
     * @param  string  $extension
     * @return void
     */
    public function addMobileExtension($extension)
    {
        if (($index = array_search($extension, $this->mobileExtensions)) !== false) {
            unset($this->mobileExtensions[$index]);
        }

        array_unshift($this->mobileExtensions, $extension);
    }

    /**
     * Register a tablet extension with the view finder.
     *
     * @param  string  $extension
     * @return void
     */
    public function addTabletExtension($extension)
    {
        if (($index = array_search($extension, $this->tabletExtensions)) !== false) {
            unset($this->tabletExtensions[$index]);
        }

        array_unshift($this->tabletExtensions, $extension);
    }
}