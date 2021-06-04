<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewProductMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $d;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($d)
    {
        $this->d = $d;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->d['type'] == 'newproduct'){
            return $this->markdown('emails.newproductmail')
                ->subject('New Product Notification');
        }

        if($this->d['type'] == 'newregistration'){
            return $this->markdown('emails.newproductmail')
                ->subject('Welcome to eComX');
        }
            
    }
}
