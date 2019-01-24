<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\product;

class DrawWon extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $product;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Product $product)
    {
        $this->user = $user;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@dehutmut.nl')
        ->subject('Loting gewonnen')
               ->markdown('emails.winnaar');
       //return $this->view('emails.winnaar');
    }
}
