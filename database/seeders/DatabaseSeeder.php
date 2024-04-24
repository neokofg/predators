<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'login' => 'neoko',
            'email' => 'wotacc0809@gmail.com',
            'name' => 'Андрей',
            'surname' => 'Васильев'
        ]);
    }
}
