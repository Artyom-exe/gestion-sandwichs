<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class InvitationEmail extends Mailable
{
    public function build()
    {
        $url = route('register'); // Lien d'inscription
        return $this->view('emails.invitation')
            ->with(['url' => $url])
            ->subject('Invitation à rejoindre l\'application');
    }
}
