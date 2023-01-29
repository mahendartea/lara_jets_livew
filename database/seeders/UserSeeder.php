<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mahendar Dwi Pyana',
            'email' => 'hendartea@gmail.com',
            'username'=> 'hendartea',
            'password' => Hash::make('mahendar'),
            'role_id' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Budi',
            'email' => 'budi@gmail.com',
            'username'=> 'budi',
            'password' => Hash::make('budi'),
            'role_id' => '2',
        ]);
        DB::table('users')->insert([
            'name' => 'handuk',
            'email' => 'handuk@gmail.com',
            'username'=> 'handuk',
            'password' => Hash::make('handuk'),
            'role_id' => '3',
        ]);
    }
}
