<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $payloadMail;
    public ?array $qr_image;

    /**
     * Create a new message instance.
     */
    public function __construct($payloadMail, $qr_image)
    {
        $this->subject= $payloadMail; 
        $this->subject= $qr_image; 
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // from : new Address('ridwanhiday49@gmail.com','Daihatsu Sahabatku'),
            // replyTo: [
            //     new Address('ridwanhiday49@gmail.com','Daihatsu Sahabatku'),
            // ],
            // return $this->payloadMail['subject'];
            // die();

            subject: $this->payloadMail,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.success',
            // with: ['name' => $this->name]
        );
    }

    /**
     * Get the attachments for the message.
     *
     */
    public function attachments(): array
    {

        // return $this->qr_image['image'];
        // die();
        return [
            Attachment::fromPath($this->qr_image['image'])
        ];
    }

}
