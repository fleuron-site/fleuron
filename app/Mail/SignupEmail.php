<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignupEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->email_data = $data;
   }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('esso0087tg@gmail.com')->subject('Bienvenue sur fleuron.tg')->view('emails.signup-email', ['email_data'=>$this->email_data]);

        /**
        $this->from(env('MAIL_USERNAME', 'coder fleuron.tg'))->subject('welcome to fleuron.tg')->view('emails.signup-email', ['email_data'=>$this->email_data]);
        
        return view('emails.signup-email', ['email_data'=>$this->email_data], function($message){
            $message->to($email)->subject('welcome to fleuron.tg');
        });*/
    }
}
