<?php

namespace Notchpay\Toolkit\Commands;

use Illuminate\Console\Command;

class ToolkitCommand extends Command
{
    public $signature = 'laravel-toolkit';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
