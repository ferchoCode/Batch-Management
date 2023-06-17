<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrador = User::create([
            'name' => 'Administrador sistema',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
        ]);

        $usuario = User::create([
            'name' => 'usuario sistema',
            'email' => 'user@user.com',
            'password' => Hash::make('12345678'),
        ]);

        $administrador->assign('administrador');
        $usuario->assign('usuario');
        

    }
}
