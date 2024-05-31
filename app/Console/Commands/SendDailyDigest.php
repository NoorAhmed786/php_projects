<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\DailyDigestMail;
use App\Models\Post;

class SendDailyDigest extends Command
{
    protected $signature = 'send:daily-digest';
    protected $description = 'Send a daily email digest of top posts to all users';

    public function handle()
    {
        $topPosts = Post::orderBy('created_at', 'desc')->take(5)->get();
        $users = User::all();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new DailyDigestMail($topPosts));
        }

        $this->info('Daily digest sent successfully.');
    }

}
