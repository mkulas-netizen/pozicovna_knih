<?php

namespace Database\Seeders;

use App\Models\Author;
use Carbon\Carbon;
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
        Author::factory()->count(10)->create();

/**
 * insert([
[
'name' => 'Silas',
'surname' => 'Atkinson',
'created_at' => Carbon::now()
],
[
'name' => 'Khadija',
'surname' => 'Atherton',
'created_at' => Carbon::now()

],
[
'name' => 'Rosa',
'surname' => 'Connolly',
'created_at' => Carbon::now()
]
]
 */
    }
}
