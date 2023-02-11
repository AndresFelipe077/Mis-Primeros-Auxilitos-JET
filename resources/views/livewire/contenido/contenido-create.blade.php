<link id="image-head" rel="shortcut icon" href="{{ asset('img/icons/algodon.png') }}" type="image/x-icon">
<x-app-layout>
    <div>
        @section('title', 'Crear contenido')

        <x-slot name="header">
            <x-header />
        </x-slot>



        <div class="container text-center mx-auto animate__animated animate__swing rounded">
            <h1 id="title-h1" class="text-center animate__animated animate__jackInTheBox">Crear contenido</h1>

            <div class="row">

                <div class="col-sm-2 text-center">
                    <img src="{{ asset('img/icons/pintura.png') }}" id="image" alt="Imagen"
                        class="mt-5 m-3 mx-auto" width="150px" height="150px">
                </div>

                <div class="col-sm-8">

                    <form class="p-3 m-3" action="{{ route('contenido.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-title m-1">
                                <div class="form-group">
                                    <label for="">Titulo</label>
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
                                <label class="h5" for="exampleFormControlFile1">Escoge tu contenido 😁😎😋</label>

                                <div>
                                    {{-- @php
                                        $extension = pathinfo()['extension'];
                                    @endphp --}}
                                    {{-- @if (Auth::user()->id) --}}
                                    <img class="rounded mx-auto m-2" src="{{ asset('img/icons/subir.png') }}"
                                        id="imgPreview" width="150px" height="150px">
                                    {{-- @else --}}
                                    <video autoplay id="video-tag" class="mx-auto m-3 rounded text-white bg-white"
                                        controls poster="{{ asset('img/icons/video.png') }}">
                                        <source id="video-source">
                                        Tu navegador no soporta elementos de video😥.
                                    </video>
                                    {{-- @endif --}}
                                </div>

                                <label for="file-upload" class="subir" id="label">
                                    <i class="bi bi-cloud-upload-fill h2"></i> Subir
                                </label>

                                <input type="file" name="file" value="{{ old('file') }}"
                                    class="form-control-file d-none" id="file-upload"
                                    onchange=" previewImage(event, '#imgPreview');" accept="image/*, video/*" />

                                @error('file')
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

                            <div class="animate__animated animate__jackInTheBox mx-auto">

                                <a class="btn bg-transparent" href="{{ route('dashboard.index') }}">
                                    <img class="mt-2" src="{{ asset('/img/icons/cancel2.png') }}" width="50px"
                                        height="50px" onclick="location.href='{{ route('dashboard.index') }}'">
                                </a>

                                <button type="submit" class="btn bg-transparent"><img
                                        src="{{ asset('/img/icons/subir2.png') }}" width="60px"
                                        height="60px"></button>
                            </div>


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
        <script src="{{ asset('js/videoPreview.js') }}"></script>

        <script>
            var extension = document.getElementById('imgPreview');
            function validate(file) {
                var ext = file.split(".");
                ext = ext[ext.length - 1].toLowerCase();
                var arrayExtensions = ["jpg", "jpeg", "png", "svg", "gif"];

                if (arrayExtensions.lastIndexOf(ext) == -1) {
                    //insert an image with the use of the "ext" variable
                   return arrayExtensions;
                }
            }
        </script>

    </div>
</x-app-layout>
