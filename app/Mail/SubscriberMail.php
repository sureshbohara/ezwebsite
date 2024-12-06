<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriberMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $message;
    public $subscriberName;


    public function __construct($title, $message, $subscriberName)
    {
        $this->title = $title;  
        $this->message = $message;  
        $this->subscriberName = $subscriberName; 
    }


     public function build(){
        return $this->view('emails.subscriber')
                    ->subject($this->title)
                    ->with([
                        'description' => $this->message,
                        'subscriberName' => $this->subscriberName,
                    ]);
    }

}
