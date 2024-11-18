@extends('layouts.app')

@section('content')
    <h1>Liste des sandwichs</h1>

    <a href="{{ route('sandwiches.create') }}">Ajouter un sandwich</a>

    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sandwiches as $sandwich)
                <tr>
                    <td>{{ $sandwich->name }}</td>
                    <td>{{ $sandwich->price }} €</td>
                    <td>
                        <a href="{{ route('sandwiches.edit', $sandwich) }}">Modifier</a>
                        <form method="POST" action="{{ route('sandwiches.destroy', $sandwich) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
