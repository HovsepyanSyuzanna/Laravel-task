<?php

namespace App\Console\Commands;

use App\Models\Subscriber;
use Illuminate\Console\Command;

class CreateSubscriberCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscribe  {email} {website_id}';

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
        /** @var Subscriber $subscriber */
        $subscriber = Subscriber::where([
            'email' => $this->argument('email'),
            'website_id' => $this->argument('website_id'),
        ])->first();

        if ($subscriber) {
            $this->warn('You already subscribed on this website');
            return 0;
        }
        Subscriber::create([
            'email' => $this->argument('email'),
            'website_id' => $this->argument('website_id'),
        ]);
        return 0;
    }
}
