@section('title', 'Crear Contenido')
<div>
        
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

                <div class="card shadow border-dark text-bg-info">
                    <div class="card-header">
                        {{ $contenido->title }}
                    </div>
                    <div class="card-body ">
                        <div class="inner">
                            <img class="card-img-top rounded-3" src="{{ asset($contenido->url) }}" alt=""
                                width="200px" height="200px">
                        </div>
                        {{-- <p class="text-danger">{{auth()->user()->name}}</p> --}}
                        <p><strong>Autor: </strong> {{ $contenido->autor }}</p>
                        <p class="card-text">
                            {{ $contenido->description }}
                        </p>

                        @if (Auth::user()->id == $contenido->user_id)
                            <a href="{{ route('contenido.edit', $contenido) }}" class="btn btn-primary">Editar</a>
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



    <!--estilos-->
    <link rel="stylesheet" href="{{ asset('css/index-home.css') }}">
</div>
