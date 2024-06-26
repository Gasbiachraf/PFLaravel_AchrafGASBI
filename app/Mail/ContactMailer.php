<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMailer extends Mailable
{
    use Queueable, SerializesModels;
    // public function index()
    // {
    //     // $hamza = $data;
    //     return view('pages.contact.components.viewMailer');
    // }

    /**
     * Create a new message instance.
     */ public $data;
    public function __construct($data)
    {

        // 
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = "Inquiry from: " . $this->data['name'] . " - " . $this->data['subject'];
        return new Envelope(
            subject: $subject,
            

        );
    }

    /**
     * Get the message content definition.
     */


    public function content(): Content
    {
        return new Content(
            view: 'pages.contact.components.viewMailer',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
