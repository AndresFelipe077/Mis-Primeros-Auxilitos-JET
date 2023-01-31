<link id="image-head" rel="shortcut icon" href="{{ asset('img/imgs/logo.png') }}" type="image/x-icon">
@section('title','Home')
<x-app-layout>


    <div>
        <x-slot name="header">
            <x-header />
        </x-slot>


        <div class="gallery">
            {{-- Cuando se borra algun contenido --}}
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

            @foreach ($contenidos as $contenido)
                <div class="col mb-4 animate__animated animate__wobble">

                    <div class="card shadow border-dark bg-white">
                        <div class="card-header">
                            {{ $contenido->title }}
                        </div>
                        <div class="card-body ">
                            <div class="contenedor inner rounded">
                                <img class="imagen card-img-top rounded " src="{{ asset($contenido->url) }}"
                                    alt="Images Mis Primeros Auxilitos" width="250px" height="250px">
                            </div>
                            <p><strong>Autor: </strong> {{ $contenido->autor }}</p>

                            <p class="card-text">
                                {{ $contenido->description }}
                            </p>

                            @if (Auth::user()->id == $contenido->user_id)
                                {{-- <a href="{{ route('contenido.edit', $contenido) }}" class="btn btn-primary">Editar</a> --}}
                                <a class="btn bg-transparent" href="{{ route('contenido.edit', $contenido) }}"><img
                                        src="{{ asset('/img/icons/lapiz-editar.png') }}" width="50px" height="50px"
                                        alt="Editar"></a>
                            @endif
                        </div>

                    </div>

                </div>
            @endforeach
        </div>


        <div class="">
            <ul class="pagination pagination-lg">
                <li class="page-item active mb-5" aria-current="page">
                    <span class="page-link bg-light h4">{{ $contenidos->links() }}</span>
                </li>
            </ul>
        </div>
        <link rel="stylesheet" href="{{ asset('css/index-home.css') }}">
        <x-slot name="footer">
            <x-footer />
        </x-slot>
    </div>
</x-app-layout>
