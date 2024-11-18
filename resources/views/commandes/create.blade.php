<form method="POST" action="{{ route('commandes.store') }}">
    @csrf <!-- Le token CSRF est obligatoire -->

    <!-- Exemple de liste de sandwichs -->
    @foreach ($sandwiches as $sandwich)
        <div>
            <label>{{ $sandwich->name }} ({{ $sandwich->price }} €)</label>
            <input type="number" name="sandwiches[{{ $sandwich->id }}]" min="0" value="0">
        </div>
    @endforeach

    <button type="submit">Passer commande</button>
</form>
