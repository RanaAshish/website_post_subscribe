<?php

namespace App\Jobs;

use App\Mail\UserEmail;
use App\Models\Post;
use App\Models\User;
use App\Models\Website;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPostJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details = null)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->details){
            $website = $this->details['website_id'];
            $users = User::wherehas('subscription',function ($q) use($website){
                $q->where('website_id', $website);
            })->get();

            foreach ($users as $key => $user) {
                Mail::to($user->email)->send(new UserEmail($this->details['title'], $this->details['description']));
            }
        }else{
            $websites = Website::all();
            $date = (new \DateTime())->modify('-1 day');
            foreach ($websites as $key => $website) {
                $posts = Post::where('website_id', $website->id)->where('created_at','>=', $date)->get();
                foreach ($posts as $key => $post) {
                    $users = User::wherehas('subscription', function ($q) use ($website) {
                        $q->where('website_id', $website->id);
                    })->get();

                    foreach ($users as $key => $user) {
                        if ($user->created_at > $post->created_at) {
                            Mail::to($user->email)->send(new UserEmail($post->title, $post->description));
                        }
                    }
                }
            }
        }


    }
}
