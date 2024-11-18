<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationEmail;
use App\Models\User;
use App\Models\Commande;

class AdminController extends Controller
{
    public function showInvitations()
    {
        return view('admin.invitations');
    }

    public function sendInvitation(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        // Envoyer l'email d'invitation
        Mail::to($request->email)->send(new InvitationEmail());

        return redirect()->route('admin.invitations')->with('success', 'Invitation envoyée avec succès.');
    }

    public function viewAllCommandes()
    {
        $commandes = Commande::with(['user', 'items.sandwich'])->get();

        return view('admin.commandes.index', compact('commandes'));
    }
}
