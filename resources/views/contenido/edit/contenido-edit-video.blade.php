<link id="image-head" rel="shortcut icon" href="{{ asset('img/icons/editar.png') }}" type="image/x-icon">
<x-app-layout>
    <div>

        @section('title', 'Editar contenido')

        <x-slot name="header">
            {{-- <x-header /> --}}
        </x-slot>


        <div class="container text-center mx-auto animate__animated animate__swing rounded">
            <h1 id="title-h1" class="titulo2">Edita tu contenido 🤗</h1>

            <div class="row">

                <div class="col-sm-2 text-center">
                    <img src="{{ asset('img/icons/nina.png') }}" id="image" alt="Imagen" class="mt-5 m-3 mx-auto"
                        width="150px" height="150px">
                </div>

                <div class="col-sm-8">
                    <div class="card">
                        <div class="video">
                        <form action="{{ route('contenido.update.video', $contenido) }}" method="POST"
                            enctype="multipart/form-data">
                        </div>
                            @csrf
                            @method('put')
                       

                            <div class="form-group">
                                <label for="">Titulo</label>
                                <input type="text" name="title" class="form-control" aria-describedby=""
                                    value="{{ old('title', $contenido->title) }}">
                                @error('title')
                                    <br>
                                    <small class="text-danger">{{ $message }}</small>
                                    <br>
                                @enderror
                            </div>

                            <div class="form-group m-1 mx-auto">
                                <label class="h5" for="exampleFormControlFile1" id="src-file">Escoge tu contenido
                                    😋😊😉</label>
                                <div>
                                    <video class="video" controls autoplay id="video-tag" class="mx-auto m-3 rounded text-white bg-white">
                                        <source id="video-source" src="{{ old('url', $contenido->url) }}">
                                        Tu navegador no soporta elementos de video😥.
                                    </video>
                                
                               
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                        
                                            var videoSource = document.getElementById("video-source");
                                            var videoTag = document.getElementById("video-tag");
                                
                                            if (videoSource && videoTag) {
                                                videoSource.src = "{{ old('url', $contenido->url) }}";
                                                videoTag.load();
                                            }
                                        });
                                    </script>

                                    <label for="file-upload" class="subir">
                                        <i class="bi bi-cloud-upload-fill h5"></i> subir
                                    </label>
                                    <input type="file" name="file"
                                        class="form-control-file mx-auto text-center d-none" id="file-upload"
                                       accept="video/*" />
                                    @error('file')
                                        <br>
                                        <small class="text-danger">{{ $message }}</small>
                                        <br>
                                    @enderror


                                </div>

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
                            <div class="segundo">
                            <button type="submit" class="btn bg-transparent "><img
                                    src="{{ asset('/img/icons/subir2.png') }}" width="60px" height="60px"></button>
                                </div>

                        </form>

                        <div>
                            <div class="row">

                                <div class="col-sm-6">
                                    <a class="btn bg-transparent" href="{{ route('dashboard.index') }}"><img
                                            src="{{ asset('/img/icons/regresar.png') }}"></a>
                                </div>

                                <div class="col-sm-6">
                                    <form method="POST" class="formulario-eliminar-contenido"
                                        action="{{ route('contenido.destroy', $contenido) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn bg-transparent">
                                            <img class="mt-2" src="{{ asset('/img/icons/borrar.png') }}"
                                                width="50px" height="50px">
                                        </button>
                                    </form>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-sm-2 text-center">
                    <img src="{{ asset('img/icons/nino.png') }}" id="image" alt="Imagen" class="mt-5 m-3 mx-auto"
                        width="150px" height="150px">
                </div>

            </div>




            <x-slot name="footer">
            </x-slot>

            <link rel="stylesheet" href="{{ asset('css/edit-contendio-vide.css') }}">
            <script src="{{ asset('js/videoPreview.js') }}"></script>

        </div>
</x-app-layout>
