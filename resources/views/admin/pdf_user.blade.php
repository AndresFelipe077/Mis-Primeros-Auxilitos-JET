<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" user="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" user="ie=edge">
    <title>Usuarios</title>

    <link rel="stylesheet" href="js_css_admin/pdf.css">

</head>

<body>
    <div class="container">
        <div>
            <img src="img/logo/logo.png" alt="Logo" width="60" height="50">
            <h3>Mis primeros auxilitos</h3>
        </div>
        <table class="table">
            <caption>Reporte de usuarios</caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Fecha de nacimiento</th>
                    <th>Foto</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->fechaNacimiento)
                                {{ $user->fechaNacimiento }}
                            @else
                                <p>Dato no disponible</p>
                            @endif
                        </td>
                        <td>
                            @if (Auth::user()->external_auth == 'google' || Auth::user()->external_auth == 'facebook')
                                @if (Auth::user()->profile_photo_path != null)
                                    <img src="{{ asset($user->profile_photo_url) }}" alt="{{ $user->name }}"
                                        class="rounded-circle object-cover mx-auto" width="80px" height="80px">
                                @else
                                    <img class="imagen card-img-top rounded " src="{{ asset($user->avatar) }}"
                                        alt="{{ $user->name }}" width="80px" height="80px"
                                        referrerpolicy="no-referrer">
                                @endif
                            @else
                                <img src="{{ asset($user->profile_photo_url) }}" alt="{{ $user->name }}"
                                    class="rounded-circle object-cover mx-auto" width="80px" height="80px">
                            @endif
                        </td>
                        <td>
                          @foreach ($user->roles as $role)
                            {{ $role->name }}
                          @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
