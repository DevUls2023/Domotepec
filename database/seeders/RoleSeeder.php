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

        Permission::create(['name' => 'home', 'description' => 'Ver Dashboard'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'modulos', 'description' => 'Ver Modulos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'perfil', 'description' => 'Ver Perfil'])->syncRoles([$role1, $role2, $role3]);

        // permisos para modulo usuarios
        Permission::create(['name' => 'users.index', 'description' => 'Ver Usuarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.create', 'description' => 'Crear Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit', 'description' => 'Editar Usuarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.destroy', 'description' => 'Eliminar Usuarios'])->syncRoles([$role1]);

        // permisos para modulo cabanas
        Permission::create(['name' => 'cabanas.index', 'description' => 'Ver Cabanas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'cabanas.create', 'description' => 'Crear Cabanas'])->syncRoles([$role1]);
        Permission::create(['name' => 'cabanas.edit', 'description' => 'Editar Cabanas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'cabanas.destroy', 'description' => 'Eliminar Cabanas'])->syncRoles([$role1]);

        // permisos para modulo empresas
        Permission::create(['name' => 'empresas.index', 'description' => 'Ver Empresas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'empresas.create', 'description' => 'Crear Empresas'])->syncRoles([$role1]);
        Permission::create(['name' => 'empresas.edit', 'description' => 'Editar Empresas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'empresas.destroy', 'description' => 'Eliminar Empresas'])->syncRoles([$role1]);

        // permisos para modulo sucursales
        Permission::create(['name' => 'sucursales.index', 'description' => 'Ver Sucursales'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'sucursales.create', 'description' => 'Crear Sucursales'])->syncRoles([$role1]);
        Permission::create(['name' => 'sucursales.edit', 'description' => 'Editar Sucursales'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'sucursales.destroy', 'description' => 'Eliminar Sucursales'])->syncRoles([$role1]);

        // permisos para modulo servicios
        Permission::create(['name' => 'servicios.index', 'description' => 'Ver Servicios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'servicios.create', 'description' => 'Crear Servicios'])->syncRoles([$role1]);
        Permission::create(['name' => 'servicios.edit', 'description' => 'Editar Servicios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'servicios.destroy', 'description' => 'Eliminar Servicios'])->syncRoles([$role1]);

        // permisos para modulo bienes
        Permission::create(['name' => 'bienes.index', 'description' => 'Ver Bienes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'bienes.create', 'description' => 'Crear Bienes'])->syncRoles([$role1]);
        Permission::create(['name' => 'bienes.edit', 'description' => 'Editar Bienes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'bienes.destroy', 'description' => 'Eliminar Bienes'])->syncRoles([$role1]);

    }
}