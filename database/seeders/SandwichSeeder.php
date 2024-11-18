<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sandwich;

class SandwichSeeder extends Seeder
{
    public function run(): void
    {
        Sandwich::create(['name' => 'Jambon-Beurre', 'description' => 'Sandwich classique au jambon et beurre', 'price' => 3.50]);
        Sandwich::create(['name' => 'Poulet-Curry', 'description' => 'Sandwich au poulet et sauce curry', 'price' => 4.00]);
        Sandwich::create(['name' => 'Végétarien', 'description' => 'Sandwich aux légumes frais', 'price' => 3.80]);
    }
}
