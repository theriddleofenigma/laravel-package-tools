<?php


namespace Enigma\LaravelPackageTools\Tests\TestPackage\Src;

use Closure;
use Enigma\LaravelPackageTools\Package;
use Enigma\LaravelPackageTools\PackageServiceProvider;

class ServiceProvider extends PackageServiceProvider
{
    public static ?Closure $configurePackageUsing = null;

    public function configurePackage(Package $package): void
    {
        $configClosure = self::$configurePackageUsing ?? function (Package $package) {
        };

        ($configClosure)($package);
    }
}
