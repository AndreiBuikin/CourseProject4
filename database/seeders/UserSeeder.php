<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $role_admin = Role::where('code', 'admin')->first();
        // Создание администратора
        User::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'pizdadada', // Пароль "pizdadada" захеширован
            'avatar' => null,
            'gender' => '1', // '1' - мужской, '2' - женский
            'role_id' => $role_admin->id,
        ]);
    }
}

