<?php

namespace App\Console\Commands;

use App\Models\Website;
use Illuminate\Console\Command;

class WebsiteCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'website:create {name} {email}';

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
        /** @var Website $website */
        $website = Website::where([
            'name' => $this->argument('name'),
            'email' => $this->argument('email'),
        ])->first();

        if ($website) {
            $this->info('You have already  created  a website');
            return 0;

        }

        Website::create([
            'name' => $this->argument('name'),
            'email' => $this->argument('email'),
        ]);

        return 0;
    }
}
