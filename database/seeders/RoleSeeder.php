<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'SuperAdministrador']);
        $role2 = Role::create(['name' => 'Administrador']);
        $role3 = Role::create(['name' => 'Cliente']);

        Permission::create(['name' => 'home', 'description' => 'Ver Dashboard'])->syncRoles([$role1, $role2 ,$role3]);
        Permission::create(['name' => 'modulos', 'description' => 'Ver Modulos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'perfil', 'description' => 'Ver Perfil'])->syncRoles([$role1, $role2 ,$role3]);

        Permission::create(['name' => 'users.index', 'description' => 'Ver Usuarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.create', 'description' => 'Crear Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit', 'description' => 'Editar Usuarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.destroy', 'description' => 'Destruir Usuarios'])->syncRoles([$role1]);

    }
}