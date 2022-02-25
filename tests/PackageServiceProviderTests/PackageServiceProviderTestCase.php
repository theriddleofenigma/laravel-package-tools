<?php


namespace Enigma\LaravelPackageTools\Tests\PackageServiceProviderTests;

use Enigma\LaravelPackageTools\Package;
use Enigma\LaravelPackageTools\Tests\TestCase;
use Enigma\LaravelPackageTools\Tests\TestPackage\Src\ServiceProvider;

abstract class PackageServiceProviderTestCase extends TestCase
{
    public function setUp(): void
    {
        ServiceProvider::$configurePackageUsing = function (Package $package) {
            $this->configurePackage($package);
        };

        parent::setUp();
    }

    abstract public function configurePackage(Package $package);

    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }
}
