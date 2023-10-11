@extends('adminlte::page')

@section('title', 'Admin users')

{{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<link id="image-head" rel="shortcut icon" href="{{ asset('img/icons/usersAdmin.png') }}" type="image/x-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.3.slim.js"
    integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

@section('content_header')
    <h1>Mis Primeros Auxilitos</h1>
@stop

@section('content')

    <body>

        @if (session('eliminar') == 'ok')
            <script>
                Swal.fire(
                    '¡Eliminado!',
                    'El usuario se elimino exitosamente.',
                    'success'
                )
            </script>
        @endif

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
                                        <th>Asignar rol</th>
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
                                                    <div class="form-check form-switch m-3">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="flexSwitchCheckDefault">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault">Admin</label>
                                                    </div>

                                                </td>

                                                <td class="align-middle">
                                                    <form method="POST" class="formulario-eliminar-usuario"
                                                        action="{{ route('admin.user.delete', $user) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger text-danger bg-danger rounded m-2"
                                                            {{-- @if (Auth::user()->id == $user->id) onclick="return confirm('¿Seguro que deseas eliminar a ti mismo?')" @endif --}} {{-- onclick="return confirm('¿Seguro que deseas eliminar este usuario?')" --}}>
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
                                <div>
                                    @if ($users->hasPages())
                                        <ul class="pagination pagination-sm">
                                            <li class="page-item active mb-5" aria-current="page">
                                                <span class="page-link bg-light h4">{{ $users->links() }}</span>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
        </div>

        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 1000,
                once: true
            });
        </script>
        <script src="{{ asset('js_css_admin/toast-delete-user.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>


    </body>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@stop
