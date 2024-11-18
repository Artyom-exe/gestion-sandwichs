<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeItemsTable extends Migration
{
    public function up(): void
    {
        Schema::create('commande_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commande_id')->constrained()->onDelete('cascade'); // Commande associée
            $table->foreignId('sandwich_id')->constrained()->onDelete('cascade'); // Sandwich associé
            $table->integer('quantity'); // Quantité de sandwichs commandés
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commande_items');
    }
}
