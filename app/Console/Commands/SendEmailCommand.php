<?php

namespace App\Console\Commands;

use App\Jobs\SendEmailJob;
use App\Models\Subscriber;
use Illuminate\Console\Command;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send {website_id} {title} {description}';

    /**
     * The console command description.
     *
     * @var string
     *
     */
    protected $description = 'Sending emails to the subscribers';

    public function handle()
    {
        $subscribers = Subscriber::where('website_id', $this->argument('website_id'))->get();

        foreach ($subscribers as $subscriber) {
            SendEmailJob::dispatch($this->argument('title'), $this->argument('description'), $subscriber);
        }
    }
}
