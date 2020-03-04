<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class payment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $usermail;
    private $paymentDetails;


    public function __construct($usermail, $paymentDetails)
    {
        $this->usermail = $usermail;
        $this->paymentDetails = $paymentDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $usermail = $this->usermail;
        $paymentDetails = $this->paymentDetails;
        return $this->subject("Payment Successfull")->from('no-reply@miniventory')->markdown('emails.payment', compact("usermail", "paymentDetails"));
    }
}
