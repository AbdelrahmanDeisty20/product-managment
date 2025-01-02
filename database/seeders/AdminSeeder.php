<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::create([
            'name' => 'ahmed',
            'email' => 'ahmed@gmail.com',
            'password' => Hash::make(123),
        ]);
        if($users)
        {
            $users->assignRole('Admin');
        }
    }
}
