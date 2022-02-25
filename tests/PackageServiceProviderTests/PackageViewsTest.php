<?php

namespace Enigma\LaravelPackageTools\Tests\PackageServiceProviderTests;

use Enigma\LaravelPackageTools\Package;

class PackageViewsTest extends PackageServiceProviderTestCase
{
    public function configurePackage(Package $package)
    {
        $package
            ->name('laravel-package-tools')
            ->hasViews();
    }

    /** @test */
    public function it_can_load_the_views()
    {
        $content = view('package-tools::test')->render();

        $this->assertStringStartsWith('This is a blade view', $content);
    }

    /** @test */
    public function it_can_publish_the_views()
    {
        $this
            ->artisan('vendor:publish --tag=package-tools-views')
            ->assertExitCode(0);

        $this->assertFileExists(base_path('resources/views/vendor/package-tools/test.blade.php'));
    }
}
