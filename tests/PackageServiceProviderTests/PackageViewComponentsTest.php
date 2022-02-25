<?php

namespace Enigma\LaravelPackageTools\Tests\PackageServiceProviderTests;

use Enigma\LaravelPackageTools\Package;
use Enigma\LaravelPackageTools\Tests\TestPackage\Components\TestComponent;

class PackageViewComponentsTest extends PackageServiceProviderTestCase
{
    public function configurePackage(Package $package)
    {
        $package
            ->name('laravel-package-tools')
            ->hasViews()
            ->hasViewComponent('abc', TestComponent::class);
    }

    /** @test */
    public function it_can_load_the_view_components()
    {
        $content = view('package-tools::component-test')->render();

        $this->assertStringStartsWith('<div>hello world</div>', $content);
    }

    /** @test */
    public function it_can_publish_the_view_components()
    {
        $this
            ->artisan('vendor:publish --tag=laravel-package-tools-components')
            ->assertExitCode(0);

        $this->assertFileExists(base_path('app/View/Components/vendor/package-tools/TestComponent.php'));
    }
}
