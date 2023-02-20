<link id="image-head" rel="shortcut icon" href="{{ asset('img/imgs/logo.png') }}" type="image/x-icon">
<x-app-layout>

    @section('title', 'Preguntitas 5 - 7')

    <x-slot name="header">
        <x-header />
    </x-slot>

    <script src="{{asset('js/show-preguntas.js')}}"></script>

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



        <div class="pregunta-container" id="pregunta-container" style="display:none;">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="email"
                    placeholder="name@example.com">
                <label for="floatingInput" class="texto-login">Titulo</label>
            </div>
            <img class="m-3 mx-auto" src="{{ asset('img/logo/logo.png') }}" alt="Imagen de pregunta" width="100px"
                height="100px">
            <label for="file-upload" class="subir">
                <i class="bi bi-cloud-upload-fill h5"></i> Subir imagen
            </label>
            <input type="file" value="{{ old('file') }}" class="form-control-file mx-auto text-center d-none"
                id="file-upload" onchange="previewImage(event, '#imgPreview')" accept="image/*" name="image" />
            <div class="row mt-4">
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name=""
                            placeholder="name@example.com">
                        <label for="floatingInput" class="texto-login">respuesta 1</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-5">
                        <input type="text" class="form-control" id="floatingInput" name=""
                            placeholder="name@example.com">
                        <label for="floatingInput" class="texto-login">respuesta 2</label>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
