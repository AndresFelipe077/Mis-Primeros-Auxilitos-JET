<div>
    <h1 id="title-h1" class="text-center animate__animated animate__jackInTheBox">Crear contenido</h1>
    <a href="{{route('dashboard.index')}}" class="animate__animated animate__jackInTheBox"><img src="{{ asset('/img/icons/regresar.png')}}"></a> 

    
    <div class="container text-center w-50 animate__animated animate__jackInTheBox">

        {{-- Otro crear contenido --}}

        {{-- <form class="p-3 m-3" action="{{route('contenido.store')}}" method="POST" enctype="multipart/form-data"> --}}
            {{-- @csrf --}}
            <div class="card" >
                <div class="card-title m-1">
                    <div class="form-group">
                        <label for="">Titulo de la imagen</label>
                        <input type="text" wire:model='title' name="title" class="form-control" id="" aria-describedby="" value="{{old('title')}}">
                          @error('title')
                                  <br>
                                      <small class="text-danger">{{$message}}</small>
                                  <br>
                          @enderror
                      </div>
                </div>
            <div class="form-group m-1">
                <label for="exampleFormControlFile1" id="src-file">Escoge una imagen</label><br>
                    <input type="file" wire:model='url' name="file" class="form-control-file" id="exampleFormControlFile1" accept="image/*" value="{{old('file')}}">
                @error('file')
                        <br>
                            <small class="text-danger">{{$message}}</small>
                        <br>
                @enderror
            </div>
              <div class="form-group m-1">
                <label for="">Autor</label>
                    <input type="text" wire:model='autor' name="autor" class="form-control" id="" aria-describedby="" value="{{old('autor')}}">
                @error('autor')
                        <br>
                            <small class="text-danger">{{$message}}</small>
                        <br>
                @enderror
              </div>
              <div class="form-group m-1">
                <label for="">Descripción</label>
                    <input type="text" wire:model='description' name="description" class="form-control" id="" aria-describedby="" value="{{old('description')}}">
                @error('description')
                        <br>
                            <small class="text-danger">{{$message}}</small>
                        <br>
                @enderror
              </div>
              <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image"
              class="disabled:opacity-25">{{-- wire:loading.remove //Para cuando se tenida el span abajo --}}
              {{-- wire:loading.attr="disabled" nos ayuda a deshabilitar el boton para que el usuario no envie muchos forms --}}
              Crear post {{-- wire:loading.attr="disable" //nos ayuda a dar styles a el btn --}}
          </x-jet-danger-button>
            {{-- <button wire:click="save" wire:target="save, image" class="disabled:opacity-25 btn btn-primary mt-2 m-3" type="submit">Subir</button> --}}
            </div>
          {{-- </form> --}}
    </div>
<link rel="stylesheet" href="{{asset('css/create-content.css')}}" />
</div>
