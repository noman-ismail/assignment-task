<?php

namespace App\Jobs;
use App\Mail\SampleEmail;
use Illuminate\Bus\Queueable;
use Mail; // Ensure this is imported
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emailAddress;

    public function __construct(string $emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    public function handle()
    {
        Mail::to($this->emailAddress)->send(new SampleEmail());
    }
}
