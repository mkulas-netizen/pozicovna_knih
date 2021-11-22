<?php

namespace App\Mail;

use App\Models\Book;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookEmail extends Mailable
{
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public Book $book)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        return $this->view('mail.book_email');
    }
}
