<?php

namespace Database\Seeders;

use App\Models\Gift;
use App\Models\Wedding;
use Illuminate\Database\Seeder;

class GiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wedding = Wedding::where('name','Fulan & Fulanah')->first();
        Gift::create([
            'wedding_id'        => $wedding->id,
            'name'              => 'Rumah Darren',
            'address'           => 'Perumahan pondok indah
            Jl. Pd. Indah No.12 12, RT.12/RW.6, Pesanggrahan, Kec. Pesanggrahan, 
            Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12320
            ',
            'maps'              => 'https://maps.app.goo.gl/FDTdgwmkumfq2fGM6',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
    }
}
