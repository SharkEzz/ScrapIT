<?php

namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailAlert extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    public $currentPrice;

    /**
     * Create a new message instance.
     *
     * @param Product $product
     * @param int $price
     */
    public function __construct(Product $product, int $price)
    {
        $this->product = $product;
        $this->currentPrice = $price;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nouveau deal !')
            ->markdown('emails.mailAlert');
    }
}
