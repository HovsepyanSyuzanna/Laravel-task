<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class PostAddCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:posts ' ;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A command to create a post for this application';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Post::create([
            'title' => Str::random(10),
            'description' => Str::random(10),
            'website_id' =>mt_rand(1,25),
        ]);


        $this->info('Post  created successfully!!!');
    }
}
