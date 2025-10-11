<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Application;

class ApplicationCreated extends Mailable
{
    use Queueable, SerializesModels;

    public Application $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function build()
    {
        $mail = $this->from('example@example.com', 'Example')
                     ->subject('New Application Received')
                     ->view('emails.application-created')
                     ->with([
                         'application' => $this->application,
                     ]);

        if ($this->application->file_url) {
            $mail->attachFromStorageDisk('public', $this->application->file_url);
        }

        return $mail;
    }
}
