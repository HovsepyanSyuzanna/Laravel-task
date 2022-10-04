<?php

namespace App\Console\Commands;


use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class WebsiteCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'website:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating a new website';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Website::create([
            'name' => Str::random(10),

        ]);


        $this->info('Website  created successfully!!!');
    }
}
