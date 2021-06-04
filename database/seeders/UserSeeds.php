<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::create(['name' => 'Carlos', 'email' => 'carlos@teste.com', 'password' => bcrypt('123456'), 'avatar' => 'carlos.jpg']);
        User::create(['name' => 'Kaio', 'email' => 'kaio@teste.com', 'password' => bcrypt('654321'), 'avatar' => 'kaio.png']);
    }
}
