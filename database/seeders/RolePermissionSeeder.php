<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;


class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Créer les rôles
        Role::create(['name' => 'Administrateur']);
        Role::create(['name' => 'Responsable']);
        Role::create(['name' => 'Utilisateur']);

        // Vous pouvez ajouter des permissions ici si nécessaire
    }
}
