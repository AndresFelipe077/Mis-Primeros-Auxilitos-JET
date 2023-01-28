<link id="image-head" rel="shortcut icon" href="{{ asset('img/menu/challengue2.png') }}" type="image/x-icon">
<x-app-layout>
    <div>
        @section('title', 'Crear contenido')

        <x-slot name="header">
        </x-slot>

        <h1 id="title-h1" class="text-center animate__animated animate__jackInTheBox">Crear contenido</h1>
        <a href="{{ route('dashboard.index') }}" class="animate__animated animate__jackInTheBox"><img
                src="{{ asset('/img/icons/regresar.png') }}"></a>


        <div class="container text-center mx-auto animate__animated animate__swing rounded">
            <div class="row">

                <div class="col-sm-2 text-center">
                    <img src="{{ asset('img/icons/pintura.png') }}" id="image" alt="Imagen" class="mt-5 m-3 mx-auto"
                        width="150px" height="150px">
                </div>

                <div class="col-sm-8">

                    <form class="p-3 m-3" action="{{ route('contenido.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-title m-1">
                                <div class="form-group">
                                    <label for="">Titulo de la imagen</label>
                                    <input type="text" name="title" class="form-control" id=""
                                        aria-describedby="" value="{{ old('title') }}">
                                    @error('title')
                                        <br>
                                        <small class="text-danger">{{ $message }}</small>
                                        <br>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group m-1 mx-auto">
                                <label for="exampleFormControlFile1" id="src-file">Escoge una imagen</label>

                                <div>
                                    <img class="rounded mx-auto m-2" src="{{ asset('img/icons/subir.png') }}"
                                        id="imgPreview" width="150px" height="150px">
                                </div>

                                <input type="file" name="file" value="{{ old('file') }}"
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
                                    aria-describedby="" value="{{ old('autor') }}">
                                @error('autor')
                                    <br>
                                    <small class="text-danger">{{ $message }}</small>
                                    <br>
                                @enderror
                            </div>
                            <div class="form-group m-1">
                                <label for="">Descripción</label>
                                <input type="text" name="description" class="form-control" id=""
                                    aria-describedby="" value="{{ old('description') }}">
                                @error('description')
                                    <br>
                                    <small class="text-danger">{{ $message }}</small>
                                    <br>
                                @enderror
                            </div>

                            <button class="btn btn-primary mt-2 m-3" type="submit">Subir</button>

                        </div>
                    </form>
                </div>

                <div class="col-sm-2 text-center">
                    <img src="{{ asset('img/icons/mano.png') }}" id="image" alt="Imagen" class="mt-5 m-3 mx-auto"
                        width="150px" height="150px">
                </div>

            </div>


        </div>



        <x-slot name="footer">
        </x-slot>

        <link rel="stylesheet" href="{{ asset('css/create-content.css') }}" />

    </div>
</x-app-layout>
