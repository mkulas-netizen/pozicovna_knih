<?php

namespace Database\Seeders;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Book::insert([
            [
                'author_id' => 1,
                'title' => 'Butcher Of The West',
                'is_borrowed' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'author_id' => 1,
                'title' => 'Hunter Of Dawn',
                'is_borrowed' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'author_id' => 1,
                'title' => 'Strangers Without Flaws',
                'is_borrowed' => 0,
                'created_at' => Carbon::now()
            ],
            [
                'author_id' => 2,
                'title' => 'Slaves And Heirs',
                'is_borrowed' => 0,
                'created_at' => Carbon::now()
            ],
            [
                'author_id' => 2,
                'title' => 'Enemies And Heirs',
                'is_borrowed' => 0,
                'created_at' => Carbon::now()
            ],
            [
                'author_id' => 2,
                'title' => 'Concept Of The River',
                'is_borrowed' => 0,
                'created_at' => Carbon::now()
            ],
            [
                'author_id' => 2,
                'title' => 'Castle Without Direction',
                'is_borrowed' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'author_id' => 3,
                'title' => 'Vanish At My Destiny',
                'is_borrowed' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'author_id' => 3,
                'title' => 'Write About The Castle',
                'is_borrowed' => 0,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
