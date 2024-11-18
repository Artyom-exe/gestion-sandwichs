<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\RoleController;
use Spatie\Permission\Middleware\RoleMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SandwichController;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Tableau de bord
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes pour les utilisateurs connectés
Route::middleware('auth')->group(function () {
    // Gestion du profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Gestion des commandes
    Route::get('/commandes/create', [CommandeController::class, 'create'])->name('commandes.create');
    Route::post('/commandes', [CommandeController::class, 'store'])->name('commandes.store');
});

// Routes pour l'administrateur
Route::middleware(['auth', RoleMiddleware::class . ':Administrateur'])->group(function () {
    // Gestion des rôles
    Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles');
    Route::post('/admin/roles/{user}', [RoleController::class, 'assignRole'])->name('admin.roles.assign');

    Route::get('/admin/invitations', [AdminController::class, 'showInvitations'])->name('admin.invitations');
    Route::post('/admin/invitations', [AdminController::class, 'sendInvitation'])->name('admin.invitations.send');

    Route::get('/admin/sandwiches', [SandwichController::class, 'index'])->name('sandwiches.index');
    Route::get('/admin/sandwiches/create', [SandwichController::class, 'create'])->name('sandwiches.create');
    Route::post('/admin/sandwiches', [SandwichController::class, 'store'])->name('sandwiches.store');
    Route::get('/admin/sandwiches/{sandwich}/edit', [SandwichController::class, 'edit'])->name('sandwiches.edit');
    Route::put('/admin/sandwiches/{sandwich}', [SandwichController::class, 'update'])->name('sandwiches.update');
    Route::delete('/admin/sandwiches/{sandwich}', [SandwichController::class, 'destroy'])->name('sandwiches.destroy');

    Route::get('/admin/commandes', [AdminController::class, 'viewAllCommandes'])->name('admin.commandes');
});

// Routes pour le responsable
Route::middleware(['auth', RoleMiddleware::class . ':Responsable'])->group(function () {
    // Gestion des commandes
    Route::get('/responsable/commandes', [CommandeController::class, 'index'])->name('responsable.commandes');
    Route::post('/responsable/commandes/{commande}/pay', [CommandeController::class, 'markAsPaid'])->name('responsable.commandes.pay');
});

// Authentification (login, registre, etc.)
require __DIR__ . '/auth.php';
