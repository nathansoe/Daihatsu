<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $pathImage;
    public $qrcodeId;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $pathImage, $qrcodeId)
    {
        $this->subject= $subject; 
        $this->pathImage= $pathImage;
        $this->qrcodeId = $qrcodeId; 
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from : new Address('ridwanhiday49@gmail.com','Daihatsu Sahabatku'),
            replyTo: [
                new Address('ridwanhiday49@gmail.com','Daihatsu Sahabatku'),
            ],
            subject: $this->subject,
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
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromStorageDisk('local', $this->pathImage)->as($this->qrcodeId . '.png')
        ];
    }

    // public function build() {
    //     return $this->view('emails.success'); 
    //   }
}
