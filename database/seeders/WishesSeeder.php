<?php

namespace Database\Seeders;

use App\Models\Wedding;
use App\Models\Wishes;
use Illuminate\Database\Seeder;

class WishesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wedding = Wedding::where('name','Fulan & Fulanah')->first();
        Wishes::create([
            'wedding_id'    => $wedding->id,
            'name'          => 'Dani Sofyan',
            'comment'       => 'Semoga menjadi keluarga bahagia',
            'hadir'         => true,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
    }
}
