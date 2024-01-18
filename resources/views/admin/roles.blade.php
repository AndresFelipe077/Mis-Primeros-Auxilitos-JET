@extends('adminlte::page')

@section('title', 'Admin users')

<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
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

        @if (session('crear') == 'ok')
            <script>
                Swal.fire(
                    'Creado!',
                    '¡Rol creado exitosamente!.',
                    'success'
                )
            </script>
        @endif

        @if (session('roleAsignado') == 'ok')
            <script>
                Swal.fire(
                    'Creado!',
                    '¡Permisos asignados al role correctamente!.',
                    'success'
                )
            </script>
        @endif

        <div class="container mt-2" data-aos="fade-down">

            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Crear rol
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Crear un role</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="POST" action="{{ route('create.role') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="name"
                                        placeholder="name@example.com" value="{{ old('name') }}">
                                    <label for="floatingInput">Rol</label>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Crear role</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @foreach ($roles as $role)
                    <div class="col-md-4" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $role->name }}">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>{{ $role->name }}</h4>
                            </div>
                            <div class="card-body">
                                @if ($role->name == 'Admin')
                                    <img src="{{ asset('img/logo/logo.png') }}" alt="imagen-role"
                                        class="rounded-circle object-cover mx-auto d-block" width="80px" height="80px">
                                @else
                                    <img src="{{ asset('img/logo/contenido.png') }}" alt="imagen-role"
                                        class="rounded-circle object-cover mx-auto d-block" width="80px" height="80px">
                                @endif
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $role->name }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel{{ $role->name }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel{{ $role->name }}">Asignar rol a permisos</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    {!! Form::model($role, ['route' => ['assing.role.permission', $role], 'method' => 'post', 'id' => 'user-form']) !!}

                                    @foreach ($permissions as $permission)
                                        <div class="form-check">
                                            {!! Form::checkbox('permissions[]', $permission->id, null, [
                                                'class' => 'form-check-input',
                                                'id' => 'permission-' . $permission->id,
                                            ]) !!}
                                            {!! Form::label('permission-' . $permission->id, $permission->name, ['class' => 'btn btn-outline-success form-check-label']) !!}
                                        </div>
                                    @endforeach

                                    <div class="modal-footer">
                                        {!! Form::button('Cancelar', ['class' => 'btn btn-danger', 'data-bs-dismiss' => 'modal']) !!}
                                        {!! Form::submit('Asignar permisos', ['class' => 'btn btn-success']) !!}
                                    </div>
                                    {!! Form::close() !!}


                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
