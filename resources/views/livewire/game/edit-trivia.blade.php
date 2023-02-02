<div>
    <link id="image-head" rel="shortcut icon" href="{{ asset('img/menu/challengue2.png') }}" type="image/x-icon">
    <x-app-layout>

        @section('title', 'Actualizar - Editar trivia')

        <x-slot name="header">
            <x-header />
        </x-slot>

        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="mt-5 text-center h3">
                        Editar trivia!!! 😎😍😃
                    </div>

                    <div class="">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('triviaUpdate', $trivia) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="mb-4">
                                        <x-jet-label value="Titulo" />
                                        <x-jet-input type="text" class="w-full" name="title"
                                            value="{{ old('title', $trivia->title) }}" />

                                        @error('title')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group m-3 mx-auto text-center">
                                        <label class="pe-auto" for="exampleFormControlFile1" id="src-file">Escoge una
                                            imagen</label>

                                        <div>
                                            <img class="rounded mx-auto m-2" src="{{ asset($trivia->image) }}"
                                                id="imgPreview" width="150px" height="150px">
                                        </div>

                                        <label for="file-upload" class="subir">
                                            <i class="bi bi-cloud-upload-fill h5"></i> Subir imagen
                                        </label>
                                        <input type="file" class="form-control-file mx-auto text-center d-none"
                                            id="file-upload" onchange="previewImage(event, '#imgPreview')"
                                            accept="image/*" name="image" />
                                        @error('image')
                                            <span class="error">{{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="mb-4">{{-- Nos ayuda a que cuando la pagina se renderice los estilos de CKEditor no se pierdan, lo que quire decir que ignora lo que esta dentro --}}
                                        <x-jet-label value="Descripción" />
                                        <div>
                                            <textarea type="text" id="editor" class="form-control w-full" rows="6" name="content">{{ old('content', $trivia->content) }}</textarea>
                                        </div>
                                        @error('content')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="text-center mb-5">

                                        <a class="btn bg-danger text-white" href="{{ route('triviaShow') }}">
                                            Cancelar
                                        </a>

                                        <button type="submit" class="btn btn-success">Editar trivia😎</button>
                                    </div>
                                </form>



                                <div>
                                    <div class="row">

                                        <div class="col-sm-12 mx-auto text-center">
                                                <form method="POST" class="formulario-eliminar-contenido"
                                                    action="{{ route('triviaDelete', $trivia) }}">
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
                    </div>
                </div>
            </div>
        </div>

        <x-slot name="footer">
            <x-footer />
        </x-slot>

    </x-app-layout>
    @push('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>

        {{-- <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(function(editor) {
                editor.model.document.on('change:data', () => {
                    @this.set('content', editor.getData())
                })

                Livewire.on('resetCKEditor', () => {
                    editor.setData('');
                });

            })
            .catch(error => {
                console.error(error);
            });
    </script> --}}
    @endpush
</div>
