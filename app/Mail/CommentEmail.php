<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $result;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($result)
    {
        $this->data = $result;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('anhquanvu97@gmail.com')->subject('Nhận xét ngày')->view('comment')->with('data', $this->data);
    }
}
