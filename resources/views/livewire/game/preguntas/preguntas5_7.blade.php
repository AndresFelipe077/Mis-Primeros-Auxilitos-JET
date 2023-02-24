<link id="image-head" rel="shortcut icon" href="{{ asset('img/imgs/logo.png') }}" type="image/x-icon">
<x-app-layout>

    @section('title', 'Preguntitas 5 - 7')

    <x-slot name="header">
        <x-header />
    </x-slot>

    {{-- <script src="{{ asset('js/show-preguntas.js') }}"></script> --}}

    <div class="container text-center" id="container-padre">
        <h1>Edad 5 - 7</h1>
        <div class="alert alert-warning text-center" role="alert">
            Recuerda que no puedes saturar a los niños con muchas preguntas
        </div>
        <p>¿Cuántas preguntas deseas hacer?</p>

        <div>
            <div class="form-floating ">
                <input type="number" class="form-control" id="floatingInput" name=""
                    placeholder="name@example.com">
                <label for="floatingInput" class="texto-login">Cantidad de preguntas</label>
            </div>
            <a href="javascript:mostrar();" class="btn btn-success m-3">Aceptar</a>
        </div>


        <form action="{{ route('triviaStore') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="pregunta-container" id="pregunta-container" {{-- style="display:none;" --}}>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="title"
                        placeholder="name@example.com">
                    <label for="floatingInput" class="texto-login">Titulo</label>
                    <div class="text-center">
                        @error('title')
                            <span class="text-danger text-center">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group m-3 mx-auto text-center">
                    <label class="pe-auto" for="exampleFormControlFile1" id="src-file">Escoge una
                        imagen</label>
                    <div>
                        <img class="rounded mx-auto m-2" src="{{ asset('img/icons/subir.png') }}" id="imgPreview"
                            width="150px" height="150px">
                    </div>
                    <label for="file-upload" class="subir">
                        <i class="bi bi-cloud-upload-fill h5"></i> Subir imagen
                    </label>
                    <input type="file" value="{{ old('file') }}"
                        class="form-control-file mx-auto text-center d-none" id="file-upload"
                        onchange="previewImage(event, '#imgPreview')" accept="image/*" name="image" />
                </div>
                <div class="row mt-4">
                    <div class="col-sm-6">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                                name="content">
                            <label for="floatingInput" class="texto-login">respuesta 1</label>
                        </div>
                        <div class="text-center">
                            @error('content')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingInput" name=""
                                placeholder="name@example.com">
                            <label for="floatingInput" class="texto-login">respuesta 2</label>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="pregunta-container" id="pregunta-container" {{-- style="display:none;" --}}>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="title"
                        placeholder="name@example.com">
                    <label for="floatingInput" class="texto-login">Titulo</label>
                    <div class="text-center">
                        @error('title')
                            <span class="text-danger text-center">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group m-3 mx-auto text-center">
                    <label class="pe-auto" for="exampleFormControlFile1" id="src-file">Escoge una
                        imagen</label>
                    <div>
                        <img class="rounded mx-auto m-2" src="{{ asset('img/icons/subir.png') }}" id="imgPreview"
                            width="150px" height="150px">
                    </div>
                    <label for="file-upload" class="subir">
                        <i class="bi bi-cloud-upload-fill h5"></i> Subir imagen
                    </label>
                    <input type="file" value="{{ old('file') }}"
                        class="form-control-file mx-auto text-center d-none" id="file-upload"
                        onchange="previewImage(event, '#imgPreview')" accept="image/*" name="image" />
                </div>
                <div class="row mt-4">
                    <div class="col-sm-6">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingInput"
                                placeholder="name@example.com" name="content">
                            <label for="floatingInput" class="texto-login">respuesta 1</label>
                        </div>
                        <div class="text-center">
                            @error('content')
                                <span class="text-danger text-center">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingInput" name=""
                                placeholder="name@example.com">
                            <label for="floatingInput" class="texto-login">respuesta 2</label>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="mb-5 btn btn-success">Subir</button>

        </form>
    </div>

    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
