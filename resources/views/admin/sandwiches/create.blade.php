@extends('layouts.app')

@section('content')
    <h1>Ajouter un nouveau sandwich</h1>

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

    <form method="POST" action="{{ route('sandwiches.store') }}">
        @csrf

        <div>
            <label for="name">Nom du sandwich :</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="price">Prix :</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" required>
        </div>

        <button type="submit">Ajouter le sandwich</button>
    </form>

    <a href="{{ route('sandwiches.index') }}">Retour à la liste des sandwichs</a>
@endsection
