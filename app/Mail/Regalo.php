<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Regalo extends Mailable
{
    use Queueable, SerializesModels;
    
    public $regalo, $mesa;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($regalo, $mesa)
    {
        $this->regalo = $regalo;
        $this->mesa = $mesa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.regalo')->subject('Regalo de boda');
    }
}
