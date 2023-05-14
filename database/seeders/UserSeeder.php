<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Admin',
            'level' => 0,
            'email' => 'dunghaph19791@fpt.edu.vn',
            'password' => '123',
        ];
        User::create($data);
        
        $data = [
            'name' => 'SupAdmin',
            'level' => 1,
            'email' => 'luanpv19791@fpt.edu.vn',
            'password' => '123',
        ];
        User::create($data);
        
    }
}