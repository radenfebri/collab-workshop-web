<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Password;

class SendPasswordResetEmail
{
    use InteractsWithQueue, Queueable, SerializesModels, SendsPasswordResetEmails;

    protected $user;

    /**
     * Create a new job instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $request = new Request();
        $request->setMethod('POST');
        $request->request->add([
            'email' => $this->user->email,
        ]);

        $this->broker()->sendResetLink($request->only('email'));
    }


    protected function broker()
    {
        return Password::broker();
    }
}
