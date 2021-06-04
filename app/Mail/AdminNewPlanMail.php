<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminNewPlanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $plan;
    public $transaction;

    public function __construct($user, $plan, $transaction)
    {
        $this->user = $user;
        $this->plan = $plan;
        $this->transaction = $transaction;
    }
    
    public function build()
    {
        return $this->markdown('emails.adminnewplan')
            ->subject('New Payment');
    }
        
}
