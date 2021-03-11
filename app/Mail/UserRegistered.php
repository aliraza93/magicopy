<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->markdown('emails.userregistered')
        //             // ->with([
        //             //     'message' => ,
        //             // ])
        //             ->from('aliraza.2369196@gmail.com', 'Magic Copy')
        //             ->subject('User Registration');
        $message = $this->from('aliraza.2369196@gmail.com')
        ->subject('User Registration')->markdown('emails.userregistered');
        return $message;
    }
}
