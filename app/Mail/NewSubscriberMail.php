<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewSubscriberMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $message;

    
    public function __construct($title, $message){
        $this->title = $title; 
        $this->message = $message;
    }


     public function build(){
        return $this->view('emails.new_subscriber')
                    ->subject($this->title)
                    ->with([
                        'description' => $this->message,
                    ]);
    }

}
