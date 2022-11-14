<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserSeeder::class]);
        $this->command->info('Users table seeded!');

        $this->call([CategorySeeder::class]);
        $this->command->info('Categories table seeded!');

        $this->call([PostSeeder::class]);
        $this->command->info('Posts table seeded!');
    }
}
