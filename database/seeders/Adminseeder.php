<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->delete();
       Admin::insert([
            'name' => 'Mostafa',
            'email' =>'Mostafa@gmail.com',
            'password' => Hash::make("12345678"),
           
        ]);
    }
}
