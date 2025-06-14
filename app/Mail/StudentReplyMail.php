<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $messageContent;

    public function __construct($messageContent)
    {
        $this->messageContent = $messageContent;
    }

    public function build()
    {
        return $this->subject('Reply from Admin')
                    ->from('admin@example.com')
                    ->to($this->messageContent['email']) // Assuming 'email' is part of the message content
                    ->view('emails.student_reply')
                    ->with([
                        'messageContent' => $this->messageContent,
                    ]);
    }
}
