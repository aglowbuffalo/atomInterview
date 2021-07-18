<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Inquiries;
use Illuminate\Support\HtmlString;


class ContactUs extends Mailable
{

    public $inquirie;

    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( Inquiries $inquirie)
    {
        $this->inquirie = $inquirie;
        $this->inquirie->message = new HtmlString($this->inquirie->message);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact.user_question')
            ->subject($this->inquirie->name.' send a Message');
    }
}
