<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $customerData;

    public function __construct($customerData)
    {
        $this->customerData = $customerData;
    }

    public function build()
    {
        $email_from = env('MAIL_FROM_ADDRESS');
        return $this->from($email_from)
                    ->subject('Registered Successfully')
                    ->view('emails.customer')
                    ->with('data', $this->customerData);
    }
}