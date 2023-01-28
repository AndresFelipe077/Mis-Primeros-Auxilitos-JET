<link id="image-head" rel="shortcut icon" href="{{ asset('img/menu/challengue2.png') }}" type="image/x-icon">
<x-app-layout>
    <div>

        @section('title', 'Editar contenido')

        <x-slot name="header">
            {{-- <x-header /> --}}
        </x-slot>

        <h1 id="title-h1" class="text-center animate__animated animate__swing rounded">Vista crear videos</h1>
        <a href="{{ route('dashboard.index') }}"><img
                src="{{ asset('/img/icons/regresar.png') }}"id="a-regresar-perfil"></a>


        <div class="container text-center mx-auto animate__animated animate__swing rounded">
            <div class="row">

                <div class="col-sm-2 text-center">
                    <img src="{{asset('img/icons/nino.png')}}" id="image" alt="Imagen" class="mt-5 m-3 mx-auto" width="150px" height="150px">
                </div>

                <div class="col-sm-8">
                    <div class="card">
                        <form action="{{ route('contenido.update', $contenido) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="">Titulo de la imagen</label>
                                <input type="text" name="title" class="form-control" id=""
                                    aria-describedby="" value="{{ old('title', $contenido->title) }}">
                                @error('title')
                                    <br>
                                    <small class="text-danger">{{ $message }}</small>
                                    <br>
                                @enderror
                            </div>

                            <div class="form-group m-1 mx-auto">
                                <label for="exampleFormControlFile1" id="src-file">Escoge una imagen</label>

                                <div>
                                    <img class="rounded mx-auto m-2" src="{{ asset($contenido->url) }}" id="imgPreview"
                                        width="150px" height="150px">
                                </div>

                                <input type="file" name="file" {{ asset($contenido->url) }}
                                    class="form-control-file mx-auto text-center" id="inputfile" accept="image/*"
                                    onchange="previewImage(event, '#imgPreview')">

                                @error('file')
                                    <br>
                                    <small class="text-danger">{{ $message }}</small>
                                    <br>
                                @enderror

                            </div>

                            <div class="form-group m-1">
                                <label for="">Autor</label>
                                <input type="text" name="autor" class="form-control" id=""
                                    aria-describedby="" value="{{ old('autor', $contenido->autor) }}">
                                @error('autor')
                                    <br>
                                    <small class="text-danger">{{ $message }}</small>
                                    <br>
                                @enderror
                            </div>



                            <div class="form-group m-1">
                                <label for="">Descripción</label>
                                <input type="text" name="description" class="form-control" id=""
                                    aria-describedby="" value="{{ old('description', $contenido->description) }}">
                                @error('description')
                                    <br>
                                    <small class="text-danger">{{ $message }}</small>
                                    <br>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2 m-3">Subir</button>
                        </form>

                        <div>
                            <form method="POST" class="formulario-eliminar-contenido"
                                action="{{ route('contenido.destroy', $contenido) }}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger rounded mb-3">Borrar contenido</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-2 text-center">
                  <img src="{{asset('img/icons/nina.png')}}" id="image" alt="Imagen" class="mt-5 m-3 mx-auto" width="150px" height="150px">
                </div>

            </div>






        </div>

        <x-slot name="footer">
        </x-slot>

        <link rel="stylesheet" href="{{ asset('css/create-content.css') }}">


    </div>
</x-app-layout>
