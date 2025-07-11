<?php

namespace App\Mail;

use App\Models\Orden;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResumenCompra extends Mailable
{
    use Queueable, SerializesModels;

    public $orden;

    public function __construct(Orden $orden)
    {
        $this->orden = $orden;
    }

    public function build()
    {
        return $this->subject('Resumen de tu compra')
                    ->markdown('emails.resumen');
    }
}