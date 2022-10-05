<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class PostAddCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:posts {title} {description} {website_id}';

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
        /** @var Post $post */
        $post = Post::where([
            'title' => $this->argument('title'),
            'description' => $this->argument('description'),
            'website_id' => $this->argument('website_id'),
        ])->first();

        if ($post) {
            $this->info('This website already have post with this title');
            return  0;
        }

        Post::create([
            'title' => $this->argument('title'),
            'description' => $this->argument('description'),
            'website_id' => $this->argument('website_id'),
        ]);

        return 0;
    }
}
