<?php

namespace App\Console\Commands;

use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use PharIo\Manifest\Email;

class Subscriber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command subscribe to the website';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       \App\Models\Subscriber::create([
            'email' =>Str::random(10).'@gmail.com',
            'website_id'=>mt_rand(1,25),

        ]);


        $this->info('You have already subscribed to the website!!!!!');
    }
}
