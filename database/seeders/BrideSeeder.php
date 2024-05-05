<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\Bride;
use App\Models\Wedding;
use Illuminate\Database\Seeder;

class BrideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wedding = Wedding::where('name', 'Fulan & Fulanah')->first();
        $bankBca = Bank::where('name','BCA')->first();
        $bankMandiri = Bank::where('name', 'Bank Mandiri')->first();
        Bride::create([
            'wedding_id'        => $wedding->id,
            'name'              => 'Darren Tan',
            'child'             => 'Putri Pertama dari',
            'name_father'       => 'Bpk Jhone Doe',
            'name_mother'       => 'Ibu Isabela Putri',
            'instagram'         => 'https://www.instagram.com/codelogydev/',
            'bank_id'           => $bankBca->id,
            'acc_name'          => 'Darren Tan',
            'acc_number'        => 923123456,
            'gender'            => 'Female',
            'photo'             => 'female.jpg',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);

        Bride::create([
            'wedding_id'        => $wedding->id,
            'name'              => 'Ijunwen',
            'child'             => 'Putra Kedua dari',
            'name_father'       => 'Bpk Bohemian Rapsody S.Pd',
            'name_mother'       => 'Ibu Fricilia Ginting',
            'instagram'         => 'https://www.instagram.com/danixsofyan/',
            'bank_id'           => $bankMandiri->id,
            'acc_name'          => 'Ijunwen',
            'acc_number'        => 456789234,
            'gender'            => 'Male',
            'photo'             => 'male.jpg',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
    }
}
