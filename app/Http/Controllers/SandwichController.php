<?php

namespace App\Http\Controllers;

use App\Models\Sandwich;
use Illuminate\Http\Request;

class SandwichController extends Controller
{
    public function index()
    {
        $sandwiches = Sandwich::all();
        return view('admin.sandwiches.index', compact('sandwiches'));
    }

    public function create()
    {
        return view('admin.sandwiches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Sandwich::create($request->only(['name', 'price']));

        return redirect()->route('sandwiches.index')->with('success', 'Sandwich ajouté avec succès.');
    }

    public function edit(Sandwich $sandwich)
    {
        return view('admin.sandwiches.edit', compact('sandwich'));
    }

    public function update(Request $request, Sandwich $sandwich)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $sandwich->update($request->only(['name', 'price']));

        return redirect()->route('sandwiches.index')->with('success', 'Sandwich mis à jour avec succès.');
    }

    public function destroy(Sandwich $sandwich)
    {
        $sandwich->delete();

        return redirect()->route('sandwiches.index')->with('success', 'Sandwich supprimé avec succès.');
    }
}
