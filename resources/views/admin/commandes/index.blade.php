@extends('layouts.app')

@section('content')
    <h1>Vue Globale : Commandes et Paiements</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID Commande</th>
                <th>Utilisateur</th>
                <th>Articles</th>
                <th>Total</th>
                <th>Payé</th>
                <th>Date de commande</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commandes as $commande)
                <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->user->name }}</td>
                    <td>
                        <ul>
                            @foreach ($commande->items as $item)
                                <li>{{ $item->quantity }} x {{ $item->sandwich->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        {{ $commande->items->sum(fn($item) => $item->quantity * $item->sandwich->price) }} €
                    </td>
                    <td>{{ $commande->is_paid ? 'Oui' : 'Non' }}</td>
                    <td>{{ $commande->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
