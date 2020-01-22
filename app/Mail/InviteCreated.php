<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Invitation;

class InviteCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $invite;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invitation $invite)
    {
        $this->invite = $invite;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('tinyblog@contact.com')
                ->view('emails.invite');
    }
}
