<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Websitemail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $reset_link;

    public function __construct($subject, $data)
    {
        $this->subject = $subject;
        $this->reset_link = $data['reset_link']; // Assign the reset_link from $data
    }

    public function build()
    {
        return $this->view('email')
                    ->subject($this->subject)
                    ->with('reset_link', $this->reset_link); // Pass reset_link to the view
    }
}
