<link id="image-head" rel="shortcut icon" href="{{ asset('img/icons/algodon.png') }}" type="image/x-icon">
<x-app-layout>

    @section('title', 'Crear video')

    <x-slot name="header">
        <x-header />
    </x-slot>

    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div class="mt-5 text-center h3">
                    Creemos videos!!! 😎😍😃
                </div>

                <div class="">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <x-jet-label value="Titulo" />
                                    <x-jet-input type="text" class="w-full" name="video_title" />
                                    <div class="text-center">
                                        @error('title')
                                            <span class="text-danger text-center">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group m-3 mx-auto text-center">

                                    <label class="pe-auto" for="exampleFormControlFile1" id="src-file">Escoge un
                                        video</label>
                                    <video controls autoplay id="video-tag" class="mx-auto m-3 rounded">
                                        <source id="video-source">
                                        Tu navegador no soporta elementos de video😥.
                                    </video>
                                    <label for="file-upload" class="subir">
                                        <i class="bi bi-cloud-upload-fill h5"></i> Subir video
                                    </label>
                                    <input type="file" name="video_url" value="{{ old('file') }}"
                                        class="form-control-file mx-auto text-center d-none" accept="video/*"
                                        id="file-upload" />

                                </div>
                                <div class="text-center">
                                    @error('image')
                                        <span class="text-danger text-center">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="mb-4">{{-- Nos ayuda a que cuando la pagina se renderice los estilos de CKEditor no se pierdan, lo que quire decir que ignora lo que esta dentro --}}
                                    <x-jet-label value="Descripción" />
                                    <div>
                                        <textarea type="text" id="editor" class="form-control w-full" rows="6" name="description"></textarea>
                                    </div>
                                    <div class="text-center">
                                        @error('content')
                                            <span class="text-danger text-center">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="text-center mb-5">

                                    <a class="btn bg-outline-danger text-white" href="{{ route('triviaShow') }}">
                                        <img src="{{ asset('/img/icons/regresar2.png') }}" alt="Image Cancelar"
                                            width="50px" height="50px">
                                    </a>

                                    <button type="submit" class="btn bg-transparent"><img
                                            src="{{ asset('/img/icons/crear3.png') }}" alt="Image Cancelar"
                                            width="50px" height="50px">
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
