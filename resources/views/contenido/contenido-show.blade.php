<link id="image-head" rel="shortcut icon" href="{{ asset('img/imgs/logo.png') }}" type="image/x-icon">
<link href="{{ asset('css/video-js.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/video.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/img-size.css') }}">
<link rel="stylesheet" href="{{ asset('css/card-size.css') }}">
<link rel="stylesheet" href="{{ asset('css/video.css') }}">
@section('title', 'Home')
<x-app-layout>


    <div>
        <x-slot name="header">
            <x-header />
        </x-slot>

        <div class="container">

            @if (session('eliminar') == 'ok')
                <script>
                    Swal.fire(
                        '¡Eliminado!',
                        'El contenido se elimino exitosamente.',
                        'success'
                    )
                </script>
            @endif

            @if (session('subir') == 'ok')
                <script>
                    Swal.fire(
                        '¡Contenido subido!',
                        '¡El envio ha sido un exito!.',
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

            <div class="row ">

                <div class="text-center mt-3">
                    <a href="{{ route('dashboard.create.image') }}" class="btn btn-outline-success mt-5"><img
                            src="{{ asset('img/icons/imagenShow.png') }}" alt="Image Trivias" width="50px"
                            height="50px"></a>
                    <a href="{{ route('dashboard.create.video') }}" class="btn btn-outline-success mt-5"><img
                            src="{{ asset('img/icons/videoShow.png') }}" alt="Image Trivias" width="50px"
                            height="50px"></a>
                </div>

                @foreach ($contenidos as $contenido)
                    <div class="col-12 col-md-6 mt-5 col-lg-4">
                        <div class="card m-3 text-center rounded animate__animated animate__wobble" id="card-contenido" >
                            <div class="card-body shadow" > 
                                <h5 class="card-title">{{ $contenido->title }}</h5>
                                <div class="contenedor rounded">
                                    @if ($contenido->url)
                                        @php
                                            $extension = pathinfo($contenido->url)['extension'];
                                        @endphp
                                        @if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif' || $extension == 'svg')
                                            <img class="imagen rounded mx-auto d-block"
                                                src="{{ $contenido->url }}" alt="Image of trivia" id="img-content">
                                        @else
                                            <video id="fm-video"
                                                class="mx-auto m-3 rounded fm-video video-js vjs-16-9 vjs-big-play-centered"
                                                data-setup="{}" controls {{--poster="{{ asset('img/icons/video.png') }}"--}}>
                                                <source src="{{ asset($contenido->url) }}">
                                                Tu navegador no soporta elementos de video😥.
                                            </video>
                                        @endif
                                    @endif
                                </div>
                                <p><strong>Autor: </strong> {{ $contenido->autor }}</p>
                                <div class="text-center mt-3">
                                    @if (Auth::user()->id == $contenido->user_id)
                                        @if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif' || $extension == 'svg')
                                            <a class="btn bg-transparent"
                                                href="{{ route('contenido.edit.image', $contenido) }}"><img
                                                    src="{{ asset('/img/icons/lapiz-editar.png') }}" width="50px"
                                                    height="50px" alt="Editar"></a>
                                        @else
                                            <a class="btn bg-transparent"
                                                href="{{ route('contenido.edit.video', $contenido) }}"><img
                                                    src="{{ asset('/img/icons/lapiz-editar.png') }}" width="50px"
                                                    height="50px" alt="Editar"></a>
                                        @endif
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        <div class="">
            <ul class="pagination pagination-lg">
                <li class="page-item active mb-5" aria-current="page">
                    <span class="page-link bg-light h4">{{ $contenidos->links() }}</span>
                </li>
            </ul>
        </div>


        <link rel="stylesheet" href="{{ asset('css/contenido.css') }}">
        <script src="{{ asset('js/video-show.js') }}"></script>
        <x-slot name="footer">
            <x-footer />
        </x-slot>
    </div>
</x-app-layout>
