<?php

use Mockery as m;

class AdaptiveFileViewFinderTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testBasicViewFinding()
    {
        $finder = $this->getFinder();
        $finder->getBrowser()->shouldReceive('isMobile')->once()->andReturn(false);
        $finder->getBrowser()->shouldReceive('isTablet')->once()->andReturn(false);
        $finder->getFilesystem()->shouldReceive('exists')->once()->with(__DIR__.'/foo.blade.php')->andReturn(true);
        $this->assertEquals(__DIR__.'/foo.blade.php', $finder->find('foo'));
    }

    public function testMobileBasicFileLoading()
    {
        $finder = $this->getFinder();
        $finder->getBrowser()->shouldReceive('isMobile')->once()->andReturn(true);
        $finder->getBrowser()->shouldReceive('isTablet')->once()->andReturn(false);
        $finder->getFilesystem()->shouldReceive('exists')->once()->with(__DIR__.'/foo.mobile.blade.php')->andReturn(true);
        $this->assertEquals(__DIR__.'/foo.mobile.blade.php', $finder->find('foo'));
    }

    public function testTabletBasicFileLoading()
    {
        $finder = $this->getFinder();
        $finder->getBrowser()->shouldReceive('isMobile')->once()->andReturn(false);
        $finder->getBrowser()->shouldReceive('isTablet')->once()->andReturn(true);
        $finder->getFilesystem()->shouldReceive('exists')->once()->with(__DIR__.'/foo.tablet.blade.php')->andReturn(true);
        $this->assertEquals(__DIR__.'/foo.tablet.blade.php', $finder->find('foo'));
    }

    protected function getFinder()
    {
        return new DigitLab\AdaptiveView\AdaptiveFileViewFinder(
            m::mock('Digitlab\AdaptiveView\Browser\Browser'),
            m::mock('Illuminate\Filesystem\Filesystem'),
            [__DIR__]
        );
    }
}
