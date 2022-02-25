<?php

namespace Enigma\LaravelPackageTools\Tests\PackageServiceProviderTests;

use Enigma\LaravelPackageTools\Package;
use Enigma\LaravelPackageTools\Tests\TestClasses\FourthTestCommand;
use Enigma\LaravelPackageTools\Tests\TestClasses\OtherTestCommand;
use Enigma\LaravelPackageTools\Tests\TestClasses\TestCommand;
use Enigma\LaravelPackageTools\Tests\TestClasses\ThirdTestCommand;

class PackageCommandsTest extends PackageServiceProviderTestCase
{
    public function configurePackage(Package $package)
    {
        $package
            ->name('laravel-package-tools')
            ->hasCommand(TestCommand::class)
            ->hasCommands([OtherTestCommand::class])
            ->hasCommands(ThirdTestCommand::class, FourthTestCommand::class);
    }

    /** @test */
    public function it_can_execute_a_registered_commands()
    {
        $this
            ->artisan('test-command')
            ->assertExitCode(0);

        $this
            ->artisan('other-test-command')
            ->assertExitCode(0);
    }
}
