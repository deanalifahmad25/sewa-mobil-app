<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        $user1 = User::create([
            'name' => 'Admin 1',
            'sim_number' => '3212345678',
            'phone' => '0812345678910',
            'address' => 'Bandung',
            'email' => 'admin1@gmail.test',
            'password' => Hash::make('secret123'),
        ]);
        $user1->assignRole($adminRole);

        $user2 = User::create([
            'name' => 'Admin 2',
            'sim_number' => '3412345678',
            'phone' => '0812345678910',
            'address' => 'Jakarta',
            'email' => 'admin2@gmail.test',
            'password' => Hash::make('secret456'),
        ]);
        $user2->assignRole($adminRole);
    }
}
