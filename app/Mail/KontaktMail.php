<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class KontaktMail extends Mailable
{
    public $kontakt;

    public function __construct($kontakt)
    {
        $this->kontakt = $kontakt;
    }

    public function build()
    {
        if ($this->kontakt['email'] == true) {
            $email = $this->kontakt['email'];
        } else {
            $email = 'noreplay@buttstaedter-bistro.de';
        }

        return $this->from($email)->subject('Kontaktanfrage über Webseite')->view('emails.kontakt')->with('kontakt', $this->kontakt);
    }
}