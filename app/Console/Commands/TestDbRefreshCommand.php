<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;


class TestDbRefreshCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tests:refresh-db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновляет тестовую БД';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->artisan('migrate:fresh', ['--database' => 'db-test']);
    }

    private function artisan($command, $params = [])
    {
        echo "{$command}...";
        Artisan::call($command, $params);
        echo 'Ok' . PHP_EOL;
    }
}
