<?php

namespace Database\Seeders;

use App\Models\Galery;
use App\Models\Wedding;
use Illuminate\Database\Seeder;

class GalerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wedding = Wedding::where('name', 'Fulan & Fulanah')->first();
        Galery::create([
            'wedding_id'        => $wedding->id,
            'gallery1'          => 'gallery1.jpeg',
            'gallery2'          => 'gallery2.jpeg',
            'gallery3'          => 'gallery3.jpeg',
            'gallery4'          => 'gallery4.jpeg',
            'gallery5'          => 'gallery5.jpeg',
            'gallery6'          => 'gallery6.jpeg',
            'video'             => 'https://www.youtube.com/embed/syMFHd5Gxxk',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
    }
}
