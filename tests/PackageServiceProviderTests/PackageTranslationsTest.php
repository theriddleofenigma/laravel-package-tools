<?php

namespace Enigma\LaravelPackageTools\Tests\PackageServiceProviderTests;

use Enigma\LaravelPackageTools\Package;

class PackageTranslationsTest extends PackageServiceProviderTestCase
{
    public function configurePackage(Package $package)
    {
        $package
            ->name('laravel-package-tools')
            ->hasTranslations();
    }

    /** @test */
    public function it_can_load_the_translations()
    {
        $this->assertEquals('translation', trans('package-tools::translations.translatable'));
    }

    /** @test */
    public function it_can_publish_the_translations()
    {
        $this
            ->artisan('vendor:publish --tag=package-tools-translations')
            ->assertExitCode(0);

        // Laravel 8.64 and up uses lang_path().
        $path = (version_compare(app()->version(), "8.64") >= 0)
            ? lang_path("vendor/package-tools/en/translations.php")
            : resource_path("lang/vendor/package-tools/en/translations.php");
        
        $this->assertFileExists($path);
    }
}
