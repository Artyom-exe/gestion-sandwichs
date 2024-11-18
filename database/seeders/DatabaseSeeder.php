<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer un utilisateur test
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Appeler le seeder RolePermissionSeeder
        $this->call([
            RolePermissionSeeder::class,
            SandwichSeeder::class,
            // Assurez-vous que ce seeder existe dans database/seeders/
        ]);
    }
}
