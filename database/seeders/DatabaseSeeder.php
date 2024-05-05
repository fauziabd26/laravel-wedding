<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(WeddingSeeder::class);
        $this->call(BrideSeeder::class);
        $this->call(DetailSeeder::class);
        $this->call(GiftSeeder::class);
        $this->call(WishesSeeder::class);
        $this->call(ThankSeeder::class);
        $this->call(GalerySeeder::class);
    }
}
