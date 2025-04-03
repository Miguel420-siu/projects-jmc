<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Permission::create(['name' => 'Ver index proyectos']);
        Permission::create(['name' => 'Ver proyectos']);
        Permission::create(['name' => 'Crear proyectos']);
        Permission::create(['name' => 'Editar proyectos']);
        Permission::create(['name' => 'Eliminar proyectos']);

        Permission::create(['name' => 'Ver index tareas']);
        Permission::create(['name' => 'Ver tareas']);
        Permission::create(['name' => 'Crear tareas']);
        Permission::create(['name' => 'Editar tareas']);
        Permission::create(['name' => 'Eliminar tareas']);

        $adminUser = User::query()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'test1234',


        ]);

        $roleAdmin = Role::create(['name' => 'Admin']);
        $adminUser->assignRole($roleAdmin);
        $permissionsAdmin = Permission::query()->pluck('name');
        $roleAdmin->syncPermissions($permissionsAdmin);



        $userColab = User::query()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => 'test1234',
        ]);

        $rolColab = Role::create(['name' => 'Colaborador']);
        $userColab->assignRole($rolColab);
        $rolColab->syncPermissions([
            'Ver proyectos',
            'Ver tareas',
            'Editar tareas',
        ]);

    }
}
