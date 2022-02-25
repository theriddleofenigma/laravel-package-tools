<?php

namespace Enigma\LaravelPackageTools\Tests\PackageServiceProviderTests;

use Enigma\LaravelPackageTools\Package;
use Enigma\LaravelPackageTools\Tests\TestClasses\TestCommand;

class PackageCommandTest extends PackageServiceProviderTestCase
{
    public function configurePackage(Package $package)
    {
        $package
            ->name('laravel-package-tools')
            ->hasCommand(TestCommand::class);
    }

    /** @test */
    public function it_can_execute_a_registered_commands()
    {
        $this
            ->artisan('test-command')
            ->assertExitCode(0);
    }
}
