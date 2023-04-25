<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PanelMemberInviteEditedEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $validated;
    public $staffrequistionform;

    public function __construct($validated, $staffrequistionform)
    {
        $this->user_id = $validated['user_id'];
        $this->staff_requistion_form_id = $validated['staff_requistion_form_id'];
        $this->panelistname = $validated['panelistname'];
        $this->panelistphonenumber = $validated['panelistphonenumber'];
        $this->interviewnotes = $validated['interviewnotes'];
        $this->interviewdate = $validated['interviewdate'];
        $this->interviewtime = $validated['interviewtime'];
        $this->interviewlocation = $validated['interviewlocation'];
        $this->staffrequistionform = $staffrequistionform;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('su-rc-app@strathmore.edu'),
            subject: '[CHANGED] Panel Member Invite Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.panelmembers.panelinvitationedited',
            with: [
                'panelistname' => $this->panelistname,
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
