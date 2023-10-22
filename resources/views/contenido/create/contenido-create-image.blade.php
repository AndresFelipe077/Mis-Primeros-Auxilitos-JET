<link id="image-head" rel="shortcut icon" href="{{ asset('img/icons/algodon.png') }}" type="image/x-icon">
<x-app-layout>
    <div>
        @section('title', 'Crear contenido')

        <x-slot name="header">
        </x-slot>


        <div class="container text-center mx-auto animate__animated animate__swing rounded">
            <h1 id="title-h1" class="text-center animate__animated animate__jackInTheBox">Crear contenido</h1>

            <div class="row">
                @if (auth()->check() && auth()->user()->subscription && auth()->user()->subscription->subscription_status === 'aprobado')
                <!-- La condición se cumple -->
                <p>La condición aaaaaaa.</p>
             
            @else
                <!-- La condición no se cumple -->
                <p>abquiere mas contenido premiun.</p>
            @endif
            
            
            
            
            
            


                <div class="col-sm-2 text-center">
                    <img src="{{ asset('img/icons/pintura.png') }}" id="image" alt="Imagen"
                        class="mt-5 m-3 mx-auto" width="150px" height="150px">
                </div>

                <div class="col-sm-8">

                    <form class="p-3 m-3" action="{{ route('contenido.store.image') }}" method="POST"
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
                                <label class="h5" for="exampleFormControlFile1">Escoge tu imagen 😁😎😋</label>

                                <img class="imagen-secundaria" src="{{ asset('img/icons/subir.png') }}"
                                    id="imgPreview">

                                <label for="file-upload" class="subir" id="label">
                                    <i class="bi bi-cloud-upload-fill h2"></i> Subir
                                </label>

                                <input type="file" name="file" value="{{ old('file') }}"
                                    class="form-control-file d-none" id="file-upload"
                                    onchange=" previewImage(event, '#imgPreview');" accept="image/*" />

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

        <link rel="stylesheet" href="{{ asset('css/create-contenido-image.css') }}" />
        <script src="{{ asset('js/form-extension.js') }}"></script>


    </div>
</x-app-layout>
