<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::insert([
            [
               'name' => 'Silas',
               'surname' => 'Atkinson'
            ],
            [
                'name' => 'Khadija',
                'surname' => 'Atherton',
            ],
            [
                'name' => 'Rosa',
                'surname' => 'Connolly'
            ]
        ]);
    }
}
