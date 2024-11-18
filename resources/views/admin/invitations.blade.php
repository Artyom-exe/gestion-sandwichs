@extends('layouts.app')

@section('content')
    <h1>Invitations</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('admin.invitations.send') }}">
        @csrf
        <label for="email">Adresse email :</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Envoyer une invitation</button>
    </form>
@endsection
