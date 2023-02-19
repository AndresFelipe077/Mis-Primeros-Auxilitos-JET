<link id="image-head" rel="shortcut icon" href="{{ asset('img/imgs/logo.png') }}" type="image/x-icon">
<x-app-layout>

    @section('title', 'Home')

    <x-slot name="header">
        <x-header />
    </x-slot>

    <div class="container text-center" style="margin-top: 100px;">
        <h1>Edad 5 - 7</h1>
        <p>Recuerda que no puedes saturar a los niños con muchas preguntas</p>
        <p>¿Cuántas preguntas deseas hacer?</p>

        {{-- <input type="text" placeholder="Cantidad de preguntas"> --}}
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com"
                value="{{ old('email') }}">
            <label for="floatingInput" class="texto-login">Cantidad de preguntas</label>
        </div>

        <div>
            {{-- <input class="m-3" type="text" placeholder="Titulo"><br> --}}
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email"
                    placeholder="name@example.com" value="{{ old('email') }}">
                <label for="floatingInput" class="texto-login">Titulo</label>
            </div>
            <img class="m-3 mx-auto" src="{{ asset('img/logo/logo.png') }}" alt="Imagen de pregunta" width="100px"
                height="100px">
            <label for="file-upload" class="subir">
                <i class="bi bi-cloud-upload-fill h5"></i> Subir imagen
            </label>
            <input type="file" value="{{ old('file') }}" class="form-control-file mx-auto text-center d-none"
                id="file-upload" onchange="previewImage(event, '#imgPreview')" accept="image/*" name="image" />
            <div class="row mt-4" style="margin-bottom: 100px !important;">
                <div class="col-sm-6">
                    {{-- <input class="m-1" type="text" placeholder="pregunta 1"> --}}
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="email"
                            placeholder="name@example.com" value="{{ old('email') }}">
                        <label for="floatingInput" class="texto-login">pregunta 1</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    {{-- <input class="m-1" type="text" placeholder="pregunta 2"> --}}
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="email"
                            placeholder="name@example.com" value="{{ old('email') }}">
                        <label for="floatingInput" class="texto-login">pregunta 2</label>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
