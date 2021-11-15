<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Gun;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::factory()->create([
//            'name' => 'admin',
//            'email' => 'admin@gmail.com',
//            'password' => Hash::make('admin'),
//        ]);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'admin']);
        Category::factory(1)->create();
        Gun::factory(1)->create();


    }
}
