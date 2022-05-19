<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory()->create([

            'name' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@admin.com',

        ]);
    }
}