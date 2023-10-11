@extends('adminlte::page')

@section('title', 'Admin users')

{{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<link id="image-head" rel="shortcut icon" href="{{ asset('img/icons/usersAdmin.png') }}" type="image/x-icon">

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
        <section class="container mt-2" data-aos="fade-down">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">
                            <h4> Lista de usuarios - Admin </h4>
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
                                                <td>
                                                    @if($user->fechaNacimiento)
                                                        {{ $user->fechaNacimiento }}
                                                    @else
                                                        Dato no disponible
                                                    @endif
                                                </td>
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
                                                    
                                                    <button class="btn btn-success text-success bg-success rounded mb-3"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-pencil-square"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </button>

                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Editar usuario - admin 🤗</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div
                                                                    class="container text-center mx-auto animate__animated animate__swing rounded">


                                                                    <div class="row">

                                                                        <div class="col-sm-2 text-center"></div>

                                                                        <div class="col-sm-8">
                                                                            <div class="card">
                                                                                {{-- <form
                                                                                    action="{{ route('admin.update.image', $contenido) }}"
                                                                                    method="POST"
                                                                                    enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    @method('put')

                                                   
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            class="btn btn-danger"
                                                                                            data-bs-dismiss="modal">Cancelar</button>
                                                                                        <button type="submit"
                                                                                            class="btn btn-success"
                                                                                            style="pointer">Actualizar
                                                                                        </button>
                                                                                    </div>


                                                                                </form> --}}

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-2 text-center"></div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>

                                                </div>

                                                </td>

                                                <td class="align-middle">
                                                    <form method="POST" class="formulario-eliminar-usuario"
                                                        action="{{ route('admin.user.delete', $user) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger text-danger bg-danger rounded m-2">
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
