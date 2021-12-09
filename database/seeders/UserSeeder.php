<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // // Crear roles
        // $roleAdmin = Role::create(['name' => 'admin']);
        // $roleCliente = Role::create(['name' => 'cliente']);
        // $roleVendedor = Role::create(['name' => 'vendedor']);

        // // Crear permisos

        // Permission::create(['name' => 'ver:role']);
        // Permission::create(['name' => 'crear:role']);
        // Permission::create(['name' => 'editar:role']);
        // Permission::create(['name' => 'eliminar:role']);

        // Permission::create(['name' => 'ver:permiso']);

        // Permission::create(['name' => 'ver:usuario']);
        // Permission::create(['name' => 'crear:usuario']);
        // Permission::create(['name' => 'editar:usuario']);
        // Permission::create(['name' => 'eliminar:usuario']);


        // Crear usuarios

        $user1 = new User();
        $user1->userId = 40035;
        $user1->name = 'Duván Jaramillo Morales';
        $user1->email = 'djaramillo@ferreterialibre.com';
        $user1->password = bcrypt('12345678');
        $user1->phone = '3122241760';
        $user1->role = 'Administrador';
        $user1->location = 'El Pozón';
        $user1->status = 1;
        $user1->birthday = '2002-09-14';
        $user1->profile_photo_path = 'profile-photos/duvan.jpg';
        $user1->save();
        // $user1->assignRole($roleAdmin);

        $user2 = new User();
        $user2->userId = 39992;
        $user2->name = 'William Castro Costa';
        $user2->email = 'w.r.castro@ferreterialibre.com';
        $user2->password = bcrypt('12345678');
        $user2->phone = '3155606763';
        $user2->role = 'Administrador';
        $user2->location = 'Villagrande de Indias 2';
        $user2->status = 1;
        $user2->birthday = '2002/09/14';
        $user2->profile_photo_path = 'profile-photos/william.jpg';
        $user2->save();
        // $user2->assignRole($roleAdmin);

        $user3 = new User();
        $user3->userId = 39127;
        $user3->name = 'David Lozanow';
        $user3->email = 'davidlmulford@ferreterialibre.com';
        $user3->password = bcrypt('12345678');
        $user3->phone = '3342322323';
        $user3->role = 'Administrador';
        $user3->location = 'Turbaco, Bolivar';
        $user3->status = 1;
        $user3->birthday = '2002/09/14';
        $user3->profile_photo_path = 'profile-photos/david.jpg';
        $user3->save();
        // $user3->assignRole($roleAdmin);

        $user4 = new User();
        $user4->userId = 12345;
        $user4->name = 'Juan Welman';
        $user4->email = 'juanwelman@hotmail.com';
        $user4->password = bcrypt('12345678');
        $user4->phone = '3342322323';
        $user4->role = 'Cliente';
        $user4->location = 'San José';
        $user4->status = 1;
        $user4->birthday = '2002/09/14';
        $user4->profile_photo_path = 'profile-photos/welman.jpg';
        $user4->save();
        // $user4->assignRole($roleCliente);

        $user5 = new User();
        $user5->userId = 1007965298;
        $user5->name = 'Duvan Jaramillo';
        $user5->email = 'duvanlol02@outlook.es';
        $user5->password = bcrypt('12345678');
        $user5->phone = '3342322323';
        $user5->role = 'Vendedor';
        $user5->location = 'Pozon';
        $user5->status = 1;
        $user5->birthday = '2002/09/14';
        $user5->profile_photo_path = 'profile-photos/duvan.jpg';
        $user5->save();
    }
}
