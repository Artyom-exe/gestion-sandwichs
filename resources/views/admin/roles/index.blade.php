<!DOCTYPE html>
<html>

<head>
    <title>Gestion des rôles</title>
</head>

<body>
    <h1>Gestion des rôles</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle(s) actuel(s)</th>
                <th>Attribuer un rôle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach ($user->roles as $role)
                            {{ $role->name }}
                        @endforeach
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.roles.assign', $user->id) }}">
                            @csrf
                            <select name="role">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}"
                                        {{ $user->roles->contains('name', $role->name) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit">Attribuer</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
