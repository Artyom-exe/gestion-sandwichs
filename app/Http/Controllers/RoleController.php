<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Affiche la liste des utilisateurs et leurs rôles.
     */
    public function index()
    {
        $users = User::with('roles')->get();
        $roles = Role::all(); // Récupère tous les rôles disponibles

        return view('admin.roles.index', compact('users', 'roles'));
    }

    /**
     * Assigne un rôle à un utilisateur.
     */

    public function assignRole(Request $request, User $user)
    {
        // Récupère le rôle depuis le formulaire
        $role = Role::where('name', $request->role)->firstOrFail();

        // Remplace tous les rôles existants par le nouveau
        $user->syncRoles([$role]);

        return redirect()->route('admin.roles')->with('success', "Le rôle {$role->name} a été attribué à l'utilisateur.");
    }
}
