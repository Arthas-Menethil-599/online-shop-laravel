<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'admin',
            'isAdmin' => true,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('qwerty1234'),
        ]);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        $user = User::query()
            ->where('name', 'admin')->first();
        $user->assignRole('admin');

        // \App\Models\User::factory(10)->create();
    }
}
