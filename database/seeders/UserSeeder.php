<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->truncate();
        $dataRole = [
            ['name' => 'admin'],
            ['name' => 'user'],
        ];
        foreach ($dataRole as $key => $value) {
            Role::create($value);
        }
        // create admin user
        $roleAdmin = Role::where('name', 'admin')->first();
        $roleUser = Role::where('name', 'user')->first();

        User::create([
            'name'              => 'admin',
            'fullname'          => 'admin',
            'email'             => 'admin@mail.com',
            'email_verified_at' =>  now(),
            'password'          =>  bcrypt('12345678'),
            'about'             => 'Saya Seorang Admin',
            'company'           => 'PT ABC Jakarta',
            'job'               => 'Admin Web',
            'country'           => 'Indonesia',
            'address'           => 'Bekasi - Jawa Barat, Indonesia',
            'phone'             => '6212345678',
            'twitter_link'      => 'https://twitter.com/#',
            'facebook_link'     => 'https://facebook.com/#',
            'instagram_link'    => 'https://instagram.com/#',
            'linkedin_link'     => 'https://linkedin.com/#',
            'role_id'           =>  $roleAdmin->id
        ]);
        User::create([
            'name'              => 'user',
            'fullname'          => 'user',
            'email'             => 'user@mail.com',
            'email_verified_at' =>  now(),
            'password'          =>  bcrypt('12345678'),
            'about'             => 'Saya Seorang User',
            'company'           => 'PT ABC Jakarta',
            'job'               => 'Web Designer',
            'country'           => 'Indonesia',
            'address'           => 'Bekasi - Jawa Barat, Indonesia',
            'phone'             => '6212345678',
            'twitter_link'      => 'https://twitter.com/#',
            'facebook_link'     => 'https://facebook.com/#',
            'instagram_link'    => 'https://instagram.com/#',
            'linkedin_link'     => 'https://linkedin.com/#',
            'role_id'           =>  $roleUser->id
        ]);
    }
}
