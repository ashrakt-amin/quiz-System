<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Test extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
      return  $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('admin@gmail.com', 'Example')
        ->subject(' test was finished')
        ->markdown('emails.test')
        ->with([
            'user' => $this->user,
        ]);
        
    }
}
