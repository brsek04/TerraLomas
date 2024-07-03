<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos si no existen
        $permissions = [
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            'ver-plato',
            'ver-bebestibles',
            'ver-compañias',
            'ver-menu',
            'ver-ramas',
            'datos',
            'cocina',
            'garzon'
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission], ['guard_name' => 'web']);
        }

        // Crear roles
        $adminRole = Role::updateOrCreate(['name' => 'admin'], ['guard_name' => 'web']);
        $cocinaRole = Role::updateOrCreate(['name' => 'cocina'], ['guard_name' => 'web']);
        $garzonRole = Role::updateOrCreate(['name' => 'garzon'], ['guard_name' => 'web']);
        $funcionarioRole = Role::updateOrCreate(['name' => 'funcionario'], ['guard_name' => 'web']); 

        // Asignar todos los permisos al rol de admin
        $adminRole->syncPermissions(Permission::all());

        // Asignar permisos específicos a cada rol
        $cocinaRole->syncPermissions(['cocina']);
        $garzonRole->syncPermissions(['garzon']);
        // Puedes agregar más permisos específicos a cada rol si es necesario
    }
}
