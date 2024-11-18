<!DOCTYPE html>
<html>

<head>
    <title>Commandes du jour</title>
</head>

<body>
    <h1>Commandes du jour</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Utilisateur</th>
                <th>Sandwichs commandés</th>
                <th>Total</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commandes as $commande)
                <tr>
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
                    <td>
                        {{ $commande->is_paid ? 'Payée' : 'Non payée' }}
                    </td>
                    <td>
                        @if (!$commande->is_paid)
                            <form method="POST" action="{{ route('responsable.commandes.pay', $commande->id) }}">
                                @csrf
                                <button type="submit">Marquer comme payée</button>
                            </form>
                        @else
                            Payée
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
