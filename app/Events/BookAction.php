<?php

namespace App\Events;

use App\Models\Book;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BookAction
{
    use Dispatchable,  SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(public Book $book)
    {
        //
    }

}
