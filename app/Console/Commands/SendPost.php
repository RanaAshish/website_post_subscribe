<?php

namespace App\Console\Commands;

use App\Mail\UserEmail;
use App\Models\Post;
use App\Models\User;
use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send New Post To All Subscribe User';

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
     * @return int
     */
    public function handle()
    {
        dispatch(new \App\Jobs\SendPostJob());
    }
}
