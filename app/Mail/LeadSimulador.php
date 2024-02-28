<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeadSimulador extends Mailable
{
    use Queueable, SerializesModels;

    public $telefone;
    public $bem;
    public $valor;
    public $nome;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($attributes)
    {
        $this->telefone =   $attributes['fone-cliente'];
        $this->bem      =   $attributes['bem'];
        $this->valor    =   $attributes['value'];
        $this->nome     =   $attributes['nome-cliente'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(config('mail.from.address'))
            ->subject("Lead enviado do site")
            ->markdown('mail.leadMail');
    }
}
