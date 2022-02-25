<?php

namespace Enigma\LaravelPackageTools\Tests\PackageServiceProviderTests;

use Enigma\LaravelPackageTools\Package;
use Enigma\LaravelPackageTools\Tests\TestClasses\TestCommand;

class PackageCommandWithinAppTest extends PackageServiceProviderTestCase
{
    public function configurePackage(Package $package)
    {
        $package
            ->name('laravel-package-tools')
            ->hasRoutes('web')
            ->hasCommand(TestCommand::class);
    }

    /** @test */
    public function it_can_execute_a_registered_command_in_the_context_of_the_app()
    {
        $response = $this->get('execute-command');

        $response->assertSee('output of test command');
    }
}
