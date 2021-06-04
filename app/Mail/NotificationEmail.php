<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if(isset($this->data['type']) && $this->data['type'] == 1){
            return $this->markdown('emails.notification')
            ->subject('Payment Notification');
        }

        if(isset($this->data['type']) && $this->data['type'] == 2){
            return $this->markdown('emails.notification')
            ->subject('Payment Made');
        }

        if(isset($this->data['type']) && $this->data['type'] == 'salespageemail'){
            return $this->markdown('emails.notification')
            ->subject('New Sales page Request');
        }

        if(isset($this->data['type']) && $this->data['type'] == 'salespageapprovalemail'){
            return $this->markdown('emails.notification')
            ->subject('Sales Page Request approved');
        }
          
    }
}
