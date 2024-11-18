@extends('layouts.app')

@section('content')
    <h1>Modifier le sandwich : {{ $sandwich->name }}</h1>

    @if ($errors->any())
        <div>
            <p style="color: red;">Veuillez corriger les erreurs suivantes :</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('sandwiches.update', $sandwich) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nom du sandwich :</label>
            <input type="text" id="name" name="name" value="{{ old('name', $sandwich->name) }}" required>
        </div>

        <div>
            <label for="price">Prix :</label>
            <input type="number" id="price" name="price" value="{{ old('price', $sandwich->price) }}" step="0.01"
                required>
        </div>

        <button type="submit">Enregistrer les modifications</button>
    </form>

    <a href="{{ route('sandwiches.index') }}">Retour à la liste des sandwichs</a>
@endsection
