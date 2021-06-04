<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class newPlanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user; 
    public $plan;

    public function __construct($user, $plan)
    {
        $this->user = $user;
        $this->plan = $plan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->markdown('emails.welcomeMail')
        ->subject('Payment Received');
    }
}
