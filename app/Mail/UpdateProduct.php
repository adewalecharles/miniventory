<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdateProduct extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $company;
    private $product;


    public function __construct($company, $product)
    {
        $this->company = $company;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $company = $this->company;
        $product = $this->product;
        return $this->subject("Product Updated")->from('no-reply@miniventory')->markdown('emails.productupdate', compact("company", "product"));
    }
}
