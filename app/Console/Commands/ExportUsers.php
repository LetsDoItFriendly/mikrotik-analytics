<?php

namespace App\Console\Commands;

use App\Exports\UsersExport;
use Illuminate\Console\Command;

class ExportUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate all users export in storage/app/users.xlsx';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        return ((new UsersExport)->store('users.xlsx'));
    }
}
