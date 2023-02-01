<div>
    <link id="image-head" rel="shortcut icon" href="{{ asset('img/menu/challengue2.png') }}" type="image/x-icon">
    <x-app-layout>

        @section('title', 'Crear trivia')

        <x-slot name="header">
            <x-header />
        </x-slot>

        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="mt-5 text-center h3">
                        Creemos trivias!!! 😎😍😃
                    </div>

                    <div class="">
                        <form wire:submit.prevent="save">

                            <div wire:loading wire:target="image"
                                class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mt-5"
                                role="alert">
                                <div class="flex">
                                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path
                                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                        </svg></div>
                                    <div>
                                        <p class="font-bold">¡Imagen cargando!</p>
                                        <p class="text-sm">Espera un momento hasta que se procese la imagen.</p>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="flex justify-center items-center h-screen">
                  @if ($image)
                      <img class="mb-4 rounded" src="{{ $image->temporaryUrl() }}" width="50%" height="50%">
                  @endif
              </div> --}}



                            <div class="mb-4">
                                <x-jet-label value="Titulo" />
                                <x-jet-input type="text" class="w-full" wire:model='title' /> {{-- defer nos ayuda a no renderizar, 
                                                                                          pero cuando el backend de esta vista tenemos las validaciones ya 
                                                                                          no es necesario por su function de update y asi mostrar el mensaje 
                                                                                          cuando no se cumpla las rules --}}

                                {{-- Utilizando de manera normal --}}
                                {{-- @error('title')
                      <h3>{{$message}}</h3>
                  @enderror --}}
                                {{-- Utilizando componente de laravel jet --}}
                                <x-jet-input-error for="title" />
                            </div>

                            <div class="mb-4">{{-- Nos ayuda a que cuando la pagina se renderice los estilos de CKEditor no se pierdan, lo que quire decir que ignora lo que esta dentro --}}
                                <x-jet-label value="Descripción" />
                                <div wire:ignore>
                                    <textarea id="editor" wire:model.defer="" class="form-control w-full" rows="6">{{-- $content --}}</textarea>
                                </div>
                                {{-- Normal --}}
                                {{-- @error('content')
                      <h3>{{$message}}</h3>
                  @enderror --}}

                                {{-- Con el componente --}}
                                <x-jet-input-error for="content" />
                            </div>


                            <div>
                                {{-- imagen --}}
                                <input type="file" wire:model="image" id="{{-- $identificador --}}">
                                <x-jet-input-error for="image" />
                            </div>

                            <div class="text-center">

                                <a class="btn bg-danger text-white" href="{{ route('triviaShow') }}">
                                    Cancelar
                                </a>

                                <x-jet-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image"
                                    class="disabled:opacity-25">{{-- wire:loading.remove //Para cuando se tenida el span abajo --}}
                                    {{-- wire:loading.attr="disabled" nos ayuda a deshabilitar el boton para que el usuario no envie muchos forms --}}
                                    Crear trivia😎 {{-- wire:loading.attr="disable" //nos ayuda a dar styles a el btn --}}
                                </x-jet-button>
                            </div>


                        </form>

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
