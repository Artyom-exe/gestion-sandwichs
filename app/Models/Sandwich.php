<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sandwich extends Model
{
    use HasFactory;

    // Déclarez les colonnes autorisées pour l'assignation de masse
    protected $fillable = [
        'name',
        'price',
    ];

    public function commandeItems()
    {
        return $this->hasMany(CommandeItem::class);
    }
}
