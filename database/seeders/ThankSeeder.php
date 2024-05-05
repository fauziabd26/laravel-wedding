<?php

namespace Database\Seeders;

use App\Models\Thank;
use App\Models\Wedding;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wedding = Wedding::where('name', 'Fulan & Fulanah')->first();
        Thank::create([
            'wedding_id'    => $wedding->id,
            'note'          => 'Ungkapan terima kasih yang sangat tulus dari kami apabila Saudara/i berkenan hadir dan turut memberikan doa restu kepada kami.',
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
    }
}
