<div>

    <h1 id="title-h1" class="text-center">Vista crear videos</h1>
    <a href="{{ route('dashboard.index') }}"><img src="{{ asset('/img/icons/regresar.png') }}"id="a-regresar-perfil"></a>


    <div class="container text-center w-50">

        <form class="p-3 m-3" action="{{ route('contenido.update', $contenido) }}" method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('put')

            <div class="card">
                <div class="card-title m-1">
                    <div class="form-group">
                        <label for="">Titulo de la imagen</label>
                        <input type="text" name="title" class="form-control" id="" aria-describedby=""
                            value="{{ old('title', $contenido->title) }}">
                        @error('title')
                            <br>
                            <small class="text-danger">{{ $message }}</small>
                            <br>
                        @enderror
                    </div>
                </div>
                <div class="form-group m-1 mx-auto">
                    <label for="exampleFormControlFile1" id="src-file">Escoge una imagen</label><br>
                    <img class="mx-auto text-center" src="{{ asset($contenido->url) }}" width="100px"
                        height="100px"><br>
                    <input type="file" name="file" class="form-control-file mx-auto" id="exampleFormControlFile1"
                        accept="image/*" value="{{ old('file', $contenido->url) }}">
                    @error('file')
                        <br>
                        <small class="text-danger">{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div class="form-group m-1">
                    <label for="">Autor</label>
                    <input type="text" name="autor" class="form-control" id="" aria-describedby=""
                        value="{{ old('autor', $contenido->autor) }}">
                    @error('autor')
                        <br>
                        <small class="text-danger">{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div class="form-group m-1">
                    <label for="">Descripción</label>
                    <input type="text" name="description" class="form-control" id="" aria-describedby=""
                        value="{{ old('description', $contenido->description) }}">
                    @error('description')
                        <br>
                        <small class="text-danger">{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-2 m-3">Subir</button>
            </div>
        </form>

        <div>

            <form method="POST" class="formulario-eliminar-contenido"
                action="{{ route('contenido.destroy', $contenido) }}">
                @csrf
                @method('delete')
                <button class="btn btn-danger rounded mb-5">Borrar contenido</button>
            </form>
        </div>


    </div>
    <link rel="stylesheet" href="{{ asset('css/create-content.css') }}">
    <script src="{{ asset('js/toast-delete.js') }}"></script>
</div>
