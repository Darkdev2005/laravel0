<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationCreated;
use Illuminate\Support\Facades\Log;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    public Application $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function handle(): void
    {
        Log::info('SendEmailJob started, Application ID: '.$this->application->id);

        $manager = User::first();

        if (!$manager) {
            Log::warning('No manager found, email not sent.');
            return;
        }

        try {
            Mail::to($manager->email)->send(new ApplicationCreated($this->application));
            Log::info('Email sent to: '.$manager->email);
        } catch (\Exception $e) {
            Log::error('SendEmailJob failed: '.$e->getMessage());
        }
    }
}
