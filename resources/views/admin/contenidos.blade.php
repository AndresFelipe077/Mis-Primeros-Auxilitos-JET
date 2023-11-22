@extends('adminlte::page')

@section('title', 'Contenidos')
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<link id="image-head" rel="shortcut icon" href="{{ asset('img/icons/contentAdmin.png') }}" type="image/x-icon">

<script src="{{ asset('js/imageview.js') }}"></script>

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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@section('content_header')
    <h1>Mis Primeros Auxilitos</h1>
@stop

@section('content')

    <body>

        @if (session('eliminar') == 'ok')
            <script>
                Swal.fire(
                    '¡Eliminado!',
                    'El contenido se elimino exitosamente.',
                    'success'
                )
            </script>
        @endif

        @if (session('actualizar') == 'ok')
            <script>
                Swal.fire(
                    '¡Contenido actualizado!',
                    '¡Actualización exitosa!.',
                    'success'
                )
            </script>
        @endif

        <section class="container mt-2" data-aos="fade-down">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">
                            <h4> Lista de contenidos </h4>
                            <a href="{{ route('admin.pdf.content') }}" class="btn btn-success" target="_target">
                                <i class="fas fa-file-pdf fa-2x"></i>
                            </a>
                            <a href="{{ route('admin.excel.contents') }}" class="btn btn-info">
                                <i class="fas fa-file-excel fa-2x"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <th>Id</th>
                                        <th>Titulo</th>
                                        <th>Autor</th>
                                        <th>Descripción</th>
                                        <th>Imagen</th>
                                        <th>Verificación</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($contenidos as $contenido)
                                            <tr data-aos="fade-right">
                                                <td scope="row">{{ $contenido->id }}</td>
                                                <td>{{ $contenido->title }}</td>
                                                <td>{{ $contenido->autor }}</td>
                                                <td>{{ $contenido->description }}</td>
                                                <td>

                                                    @if ($contenido->url)
                                                        @php
                                                            $extension = pathinfo($contenido->url)['extension'];
                                                        @endphp
                                                        @if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif' || $extension == 'svg')
                                                            <img class="imagen rounded mx-auto d-block"
                                                                src="{{ $contenido->url }}" alt="Image of trivia"
                                                                id="img-content" width="80px" height="80px">
                                                        @else
                                                            <video id="fm-video"
                                                                class="mx-auto m-3 rounded fm-video video-js vjs-16-9 vjs-big-play-centered"
                                                                data-setup="{}" controls {{-- poster="{{ asset('img/icons/video.png') }}" --}}
                                                                width="80px" height="80px">
                                                                <source src="{{ asset($contenido->url) }}">
                                                                Tu navegador no soporta elementos de video😥.
                                                            </video>
                                                        @endif
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($contenido->verified == 1)
                                                        <p class="text-success">Verificado</p>
                                                    @else
                                                        <p class="text-danger">sin verificar</p>

                                                        <a href="{{ route('admin.excel.contents') }}"
                                                            class="btn btn-success ml-4"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal{{ $contenido->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 100 100">
                                                                <circle cx="50" cy="50" r="40" stroke="green" stroke-width="3" fill="white" />
                                                                <path d="M30 50L45 65L70 30" stroke="green" stroke-width="5" fill="transparent" />
                                                              </svg>                                                              
                                                        </a>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal{{ $contenido->id }}" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel{{ $contenido->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                            Verificar contenido</h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <p class="h3">¿De seguro deseas verificar este
                                                                            contenido? 😊😊😊😊</p>

                                                                        <form method="POST" class="text-center"
                                                                            action="{{ route('content.verified', $contenido) }}">
                                                                            @csrf
                                                                            @method('put')

                                                                            <div class="check-group m-3">
                                                                                <input type="checkbox" id="check1"
                                                                                    name="verified" value="1"
                                                                                    class="form-check-input form-check-lg">
                                                                                <label for="check1"
                                                                                    class="form-check-label">Verificar</label>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-danger"
                                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-success">Verificar</button>
                                                                            </div>

                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endif
                                                </td>
                                                <td class="align-middle">

                                                    <button class="btn btn-success text-success bg-success rounded mb-3"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $contenido->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-pencil-square"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </button>

                                                    <div class="modal fade" id="exampleModal{{ $contenido->id }}"
                                                        tabindex="-1"
                                                        aria-labelledby="exampleModalLabel{{ $contenido->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5"
                                                                        id="exampleModalLabel{{ $contenido->id }}">
                                                                        Editar contenido 🤗</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div
                                                                        class="container text-center mx-auto animate__animated animate__swing rounded">


                                                                        <div class="row">

                                                                            <div class="col-sm-2 text-center"></div>

                                                                            <div class="col-sm-8">
                                                                                <div class="card">
                                                                                    <form
                                                                                        action="{{ route('admin.update.image', $contenido) }}"
                                                                                        method="POST"
                                                                                        enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        @method('put')

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="">Titulo</label>
                                                                                            <input type="text"
                                                                                                name="title"
                                                                                                class="form-control"
                                                                                                aria-describedby=""
                                                                                                value="{{ old('title', $contenido->title) }}">
                                                                                            @error('title')
                                                                                                <br>
                                                                                                <small
                                                                                                    class="text-danger">{{ $message }}</small>
                                                                                                <br>
                                                                                            @enderror
                                                                                        </div>

                                                                                        <div
                                                                                            class="form-group m-1 mx-auto">
                                                                                            <label class="h5"
                                                                                                for="exampleFormControlFile1"
                                                                                                id="src-file">Escoge tu
                                                                                                contenido
                                                                                                😋😊😉</label>
                                                                                            <div>
                                                                                                <img class="rounded mx-auto m-2"
                                                                                                    src="{{ asset($contenido->url) }}"
                                                                                                    id="imgPreview"
                                                                                                    width="150px"
                                                                                                    height="150px">

                                                                                                <label for="file-upload"
                                                                                                    class="subir">
                                                                                                    <i
                                                                                                        class="bi bi-cloud-upload-fill h5"></i>
                                                                                                    Escoger contenido
                                                                                                </label>
                                                                                                <input type="file"
                                                                                                    name="file"
                                                                                                    class="form-control-file mx-auto text-center d-none"
                                                                                                    id="file-upload"
                                                                                                    onchange="previewImage(event, '#imgPreview')"
                                                                                                    accept="image/*" />
                                                                                                @error('file')
                                                                                                    <br>
                                                                                                    <small
                                                                                                        class="text-danger">{{ $message }}</small>
                                                                                                    <br>
                                                                                                @enderror


                                                                                            </div>

                                                                                        </div>

                                                                                        <div class="form-group m-1">
                                                                                            <label
                                                                                                for="">Descripción</label>
                                                                                            <input type="text"
                                                                                                name="description"
                                                                                                class="form-control"
                                                                                                id=""
                                                                                                aria-describedby=""
                                                                                                value="{{ old('description', $contenido->description) }}">
                                                                                            @error('description')
                                                                                                <br>
                                                                                                <small
                                                                                                    class="text-danger">{{ $message }}</small>
                                                                                                <br>
                                                                                            @enderror
                                                                                        </div>

                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                class="btn btn-danger"
                                                                                                data-bs-dismiss="modal">Cancelar</button>
                                                                                            <button type="submit"
                                                                                                class="btn btn-success"
                                                                                                style="pointer">Actualizar
                                                                                            </button>
                                                                                        </div>


                                                                                    </form>

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

                                <form method="POST" class="formulario-eliminar-contenido"
                                    action="{{ route('admin.contenido.destroy', $contenido) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger text-danger bg-danger rounded ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </button>

                                </form>

                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                            <div>
                                @if ($contenidos->hasPages())
                                    <ul class="pagination pagination-sm">
                                        <li class="page-item active mb-5" aria-current="page">
                                            <span class="page-link bg-light h4">{{ $contenidos->links() }}</span>
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

        <script src="{{ asset('js_css_admin/toast-delete-content.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>

        <script src="{{ asset('js/videoPreview.js') }}"></script>


    </body>
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@stop
