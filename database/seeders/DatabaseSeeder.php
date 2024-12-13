<?php

namespace Database\Seeders;
use DB;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Afraym',
            'email' => 'afraymn@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        ini_set('memory_limit', '-1');

        DB::unprepared(file_get_contents(__dir__ . '/breeds.sql'));
    }
}
