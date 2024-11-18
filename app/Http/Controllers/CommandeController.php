<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sandwich;
use App\Models\Commande;
use App\Models\CommandeItem;

class CommandeController extends Controller
{
    public function create()
    {
        $sandwiches = Sandwich::all();
        return view('commandes.create', compact('sandwiches'));
    }

    public function store(Request $request)
    {
        $commande = Commande::create([
            'user_id' => auth()->id(),
            'order_date' => now(),
        ]);

        foreach ($request->sandwiches as $sandwichId => $quantity) {
            if ($quantity > 0) {
                CommandeItem::create([
                    'commande_id' => $commande->id,
                    'sandwich_id' => $sandwichId,
                    'quantity' => $quantity,
                ]);
            }
        }

        return redirect()->route('dashboard')->with('success', 'Commande enregistrée avec succès !');
    }

    public function index()
    {
        $commandes = Commande::with(['user', 'items.sandwich'])
            ->whereDate('order_date', now()->toDateString()) // Commandes du jour
            ->get();

        return view('responsable.commandes.index', compact('commandes'));
    }

    public function markAsPaid(Commande $commande)
    {
        $commande->update(['is_paid' => true]);

        return redirect()->route('responsable.commandes')->with('success', 'Commande marquée comme payée.');
    }
}
