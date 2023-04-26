<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CandidateInterviewInviteEmail extends Mailable
{
    use Queueable, SerializesModels;


    public $applicantdata;
    public $positiondetails;

    public $validated;

    public $interviewresponse;
    /**
     * Create a new message instance.
     */
    public function __construct($applicantdata, $positiondetails, $validated, $interviewresponse)
    {
        $this->applicantdata = $applicantdata;
        $this->positiondetails = $positiondetails;
        $this->interviewresponse = $interviewresponse;
        $this->extrarequirements = $validated['extrarequirements'];
        $this->interviewdate = $validated['interviewdate'];
        $this->interviewtime = $validated['interviewtime'];
        $this->interviewlocation = $validated['interviewlocation'];

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('su-rc-app@strathmore.edu'),
            subject: 'Strathmore University People and Culture Department',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.candidate.interviewinvitation',
            with: [
                'extrarequirements' => $this->extrarequirements,
                'interviewdate' => $this->interviewdate,
                'interviewtime' => $this->interviewtime,
                'interviewlocation' => $this->interviewlocation,
            ],
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
