<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ShowEntry;

class ApplicationConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $userName;
    protected $eventName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName, $eventName)
    {
        $this->userName = $userName;
        $this->eventName = $eventName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->view('email.eventEntryEmail')->with([
          'event' => $this->eventName,
          'userName' => $this->userName
      ]);
    }
}
