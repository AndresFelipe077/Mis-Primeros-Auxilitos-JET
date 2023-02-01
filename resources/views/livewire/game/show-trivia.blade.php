<div>
    <link id="image-head" rel="shortcut icon" href="{{ asset('img/menu/challengue2.png') }}" type="image/x-icon">
    <x-app-layout>
    
        @section('title', 'Trivias')
    
        <x-slot name="header">
            <x-header />
        </x-slot>

        <div class="container" >

            <div class="row ">
    
                <div class="text-center mt-3">
                  <a href="{{route('triviaCreate')}}" class="btn btn-success mt-5">Crear</a>
                  <a href="{{route('triviaEdit')}}" class="btn btn-danger mt-5">Editar</a> 
                </div>
            
                @foreach($trivias as  $trivia)

                <div class="col-12 col-md-6 mt-5 col-lg-4" >
                    <div class="card m-3 text-center rounded animate__animated animate__bounceIn">
                        <div class="card-body shadow">
                            <h5 class="card-title">{{ $trivia->title }}</h5>
                            <div class="contenedor rounded">
                                <img class="imagen rounded mx-auto d-block" src="{{ $trivia->image }}" alt="Image of trivia"
                                    width="250px" height="250px">
                            </div>
                            {{-- <p class="card-text">{!! $trivia->content !!}</p> --}}
                            <div class="text-center">
                                <a href="#" class="btn btn-primary ">Vamos!!! <i class="bi bi-lightbulb-fill"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
    
        </div>
    
    
        <div class="">
            <ul class="pagination pagination-lg">
                <li class="page-item active mb-5" aria-current="page">
                    <span class="page-link bg-light h4">{{ $trivias->links() }}</span>
                </li>
            </ul>
        </div>


        <x-slot name="footer">
            <x-footer />
        </x-slot>

    </x-app-layout>
</div>