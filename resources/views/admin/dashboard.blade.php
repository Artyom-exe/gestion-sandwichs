@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tableau de bord Admin</h1>
        <form method="POST" action="{{ route('admin.invite') }}">
            @csrf
            <input type="email" name="email" placeholder="Inviter un employé" required>
            <button type="submit">Envoyer l'invitation</button>
        </form>
    </div>
@endsection
