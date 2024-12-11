<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->name = 'Super Admin';
        $admin->slug = Str::random(10);
        $admin->email = 'admin@gmail.com';
        $admin->password = Hash::make('admin');
        $admin->level = 1;
        $admin->save();
    }
}
