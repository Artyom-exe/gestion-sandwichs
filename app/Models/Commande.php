<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    /**
     * Les colonnes autorisées pour l'assignation massive.
     */
    protected $fillable = [
        'user_id',        // Identifiant de l'utilisateur
        'order_date',     // Date de la commande
        'is_paid',        // Statut du paiement
    ];

    /**
     * Relation : Une commande appartient à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation : Une commande a plusieurs items.
     */
    public function items()
    {
        return $this->hasMany(CommandeItem::class);
    }
}
