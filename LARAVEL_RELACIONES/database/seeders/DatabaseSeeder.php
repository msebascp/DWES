<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Owner;
use App\Models\Pet;
use App\Models\Toy;
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
        $this->call([
            OwnerSeeder::class,
            PetSeeder::class,
            ToySeeder::class,
        ]);
    }
}
