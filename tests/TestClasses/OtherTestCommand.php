<?php

namespace Enigma\LaravelPackageTools\Tests\TestClasses;

use Illuminate\Console\Command;

class OtherTestCommand extends Command
{
    public $name = 'other-test-command';

    public function handle()
    {
        $this->info('output of test command');
    }
}
