<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeItem extends Model
{
    use HasFactory;

    /**
     * Les colonnes autorisées pour l'assignation massive.
     */
    protected $fillable = [
        'commande_id',  // ID de la commande associée
        'sandwich_id',  // ID du sandwich
        'quantity',     // Quantité commandée
    ];

    /**
     * Relation : Un item appartient à une commande.
     */
    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    /**
     * Relation : Un item est lié à un sandwich.
     */
    public function sandwich()
    {
        return $this->belongsTo(Sandwich::class);
    }
}
