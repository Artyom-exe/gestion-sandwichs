<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSandwichesTable extends Migration
{
    public function up(): void
    {
        Schema::create('sandwiches', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom du sandwich
            $table->text('description')->nullable(); // Description facultative
            $table->decimal('price', 8, 2); // Prix du sandwich
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sandwiches');
    }
}
