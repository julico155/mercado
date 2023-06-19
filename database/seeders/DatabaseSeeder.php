<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;

use App\Models\carrito;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->roles();
        $this->cargarUsuarios();
    }
    public function roles()
    {
        $dev            = Role::create(['name' => 'dev']);
        $cliente        = Role::create(['name' => 'cliente']);
        $empresa    = Role::create(['name' => 'empresa']);
        ////////////ADMIN
        Permission::create(['name' => 'admin'])->syncRoles([$dev]);
        ////////////ROLES
        Permission::create(['name' => 'empresa'])->syncRoles([$dev, $empresa]);
        Permission::create(['name' => 'cliente'])->syncRoles([$dev, $cliente]);
        ////////////
    }

    public function cargarUsuarios(){

        $user = new User();
        $user->id = 1;
        $user->name =  'admin';
        $user->email =  'julio@correo.com';
        $user->password = bcrypt('password');
        $user->profile_photo_path = 'img/default.png';
        $user->assignRole('dev');
        $user->save();

        $carrito = new carrito();
        $carrito->cliente_id = $user->id;
        $carrito->total = 0;
        $carrito->estado = 'pendiente';
        $carrito->save();


        $user = new User();
        $user->id = 2;
        $user->name =  'empresa';
        $user->email =  'empresa@correo.com';
        $user->password = bcrypt('password');
        $user->profile_photo_path = 'img/default.png';
        $user->assignRole('empresa');
        $user->save();

        $carrito = new carrito();
        $carrito->cliente_id = $user->id;
        $carrito->total = 0;
        $carrito->estado = 'pendiente';
        $carrito->save();

        $user = new User();
        $user->id = 3;
        $user->name =  'cliente';
        $user->email =  'cliente@correo.com';
        $user->password = bcrypt('password');
        $user->profile_photo_path = 'img/default.png';
        $user->assignRole('cliente');
        $user->save();

        $carrito = new carrito();
        $carrito->cliente_id = $user->id;
        $carrito->total = 0;
        $carrito->estado = 'pendiente';
        $carrito->save();

    }
}
