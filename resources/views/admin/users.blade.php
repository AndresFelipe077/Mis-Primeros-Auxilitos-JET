@extends('adminlte::page')

@section('title', 'Admin users')

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<link id="image-head" rel="shortcut icon" href="{{ asset('img/icons/usersAdmin.png') }}" type="image/x-icon">

@section('content_header')
    <h1>Mis Primeros Auxilitos</h1>
@stop

@section('content')

    <body>
        <section class="container mt-2" data-aos="fade-down">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">
                            <h4> Lista de usuarios </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Foto</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr data-aos="fade-right">
                                                <td scope="row">{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->fechaNacimiento }}</td>
                                                <td>

                                                    @if (Auth::user()->external_auth == 'google' || Auth::user()->external_auth == 'facebook')
                                                        @if (Auth::user()->profile_photo_path != null)
                                                            <img src="{{ asset($user->profile_photo_url) }}"
                                                                alt="{{ $user->name }}"
                                                                class="rounded-circle object-cover mx-auto" width="80px"
                                                                height="80px">
                                                        @else
                                                            <img class="imagen card-img-top rounded "
                                                                src="{{ asset($user->avatar) }}" alt="{{ $user->name }}"
                                                                width="80px" height="80px" referrerpolicy="no-referrer">
                                                        @endif
                                                    @else
                                                        <img src="{{ asset($user->profile_photo_url) }}"
                                                            alt="{{ $user->name }}"
                                                            class="rounded-circle object-cover mx-auto" width="80px"
                                                            height="80px">
                                                    @endif



                                                </td>

                                                <td class="align-middle">
                                                    {{-- Toca crear un get para ir a otra vista y ahi si editar --}}
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <button
                                                            class="btn btn-success text-success bg-success rounded m-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td>

                                                <td class="align-middle">
                                                    <form method="POST" action="">
                                                        @csrf
                                                        @method('delete')
                                                        <button
                                                            class="btn btn-danger text-danger bg-danger rounded m-2"
                                                            onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-x-circle"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                                <path
                                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                            </svg>
                                                        </button>
                                                    </form>

                                                    {{-- <x-jet-danger-button wire:click="deleteUser"
                                                        wire:loading.attr="disabled">
                                                        <div wire:loading wire:target="deleteUser"
                                                            class="spinner-border spinner-border-sm" role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>

                                                        {{ __('Sí, eliminar mi cuenta') }}
                                                    </x-jet-danger-button> --}}

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="">
                                    <ul class="pagination pagination-lg">
                                        <li class="page-item active mb-5" aria-current="page">
                                            <span class="page-link bg-light h4">{{ $users->links() }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Ingresar datos:
                    </div>
                    <form action="" class="p-4" method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre: </label>
                            <input type="text" class="form-control" name="" autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Correo: </label>
                            <input type="text" class="form-control" name="" autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Fecha De Nacimiento: </label>
                            <input type="text" class="form-control" name="" autofocus>
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="oculto" value="1">
                            <input type="submit" class="btn btn-primary" value="Registrar">
                        </div>
                    </form>
                </div>
            </div> --}}
        </div>
        </div>

        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
              duration: 1000,
              once: true
            });
        </script>

    </body>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@stop
