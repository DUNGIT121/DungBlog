<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\NotifyPost;
use App\Models\User;
use Mail;

class PostJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $post;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($post){
        $this->post = $post;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $author_id = $this->post->user_id;

        $users = User::whereNotIn('id', [$author_id])->get();
        foreach ($users as $user) {
            $user->notify(new NotifyPost($this->post));
        }
    }
}
