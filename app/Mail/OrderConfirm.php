<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderConfirm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sale_id;
    public function __construct($sale_id)
    {
        $this->sale_id = $sale_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('syedudding1@gmail.com')
              ->to('syeduddin1@yahoo.com')
              ->view('mail.orderconfirm', compact('sale_id'));
    }
}
