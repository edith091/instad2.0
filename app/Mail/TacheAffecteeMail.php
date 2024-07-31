<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TacheAffecteeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $demande;
    public $technicien;
    public $dateAffectation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demande, $technicien, $dateAffectation)
    {
        $this->demande = $demande;
        $this->technicien = $technicien;
        $this->dateAffectation = $dateAffectation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Tâche affectée')
                    ->view('emails.tache-affectee');
    }
}
