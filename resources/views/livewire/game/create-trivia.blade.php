<div>
<link id="image-head" rel="shortcut icon" href="{{ asset('img/menu/challengue2.png') }}" type="image/x-icon">
<x-app-layout>

    @section('title', 'Crear trivia')

    <x-slot name="header">
        <x-header />
    </x-slot>


    <div class="container" >

        

        <div class="row " >

            <div class="text-center mt-3">
              <a href="{{route('triviaCreate')}}" class="btn btn-success mt-5">Crear</a>  
            </div>
        
            <div class="col-12 col-md-6 mt-5 col-lg-4" >
                <div class="card m-3 text-center rounded animate__animated animate__swing rounded">
                    <div class="card-body shadow">
                        <h5 class="card-title">Tipos de curitas</h5>
                        <div class="contenedor rounded">
                            <img class="imagen rounded mx-auto d-block" src="{{ asset('img/menu/challengue2.png') }}" alt="Image of trivia"
                                width="250px" height="250px">
                        </div>
                        <p class="card-text">Trivia con preguntas de curas.</p>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary ">Vamos!!! <i class="bi bi-lightbulb-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mt-5 col-lg-4">
                <div class="card m-3 text-center rounded animate__animated animate__swing rounded">
                    <div class="card-body shadow">
                        <h5 class="card-title">Tipos de curitas</h5>
                        <div class="contenedor rounded">
                            <img class="imagen rounded mx-auto d-block" src="{{ asset('img/menu/challengue2.png') }}" alt="Image of trivia"
                                width="250px" height="250px">
                        </div>
                        <p class="card-text">Trivia con preguntas de curas.</p>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary ">Vamos!!! <i class="bi bi-lightbulb-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mt-5 col-lg-4">
                <div class="card m-3 text-center rounded animate__animated animate__swing rounded">
                    <div class="card-body shadow">
                        <h5 class="card-title">Tipos de curitas</h5>
                        <div class="contenedor rounded">
                            <img class="imagen rounded mx-auto d-block" src="{{ asset('img/menu/challengue2.png') }}" alt="Image of trivia"
                                width="250px" height="250px">
                        </div>
                        <p class="card-text">Trivia con preguntas de curas.</p>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary ">Vamos!!! <i class="bi bi-lightbulb-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mt-5 col-lg-4">
                <div class="card m-3 text-center rounded animate__animated animate__swing rounded">
                    <div class="card-body shadow">
                        <h5 class="card-title">Tipos de curitas</h5>
                        <div class="contenedor rounded">
                            <img class="imagen rounded mx-auto d-block" src="{{ asset('img/menu/challengue2.png') }}" alt="Image of trivia"
                                width="250px" height="250px">
                        </div>
                        <p class="card-text">Trivia con preguntas de curas.</p>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary ">Vamos!!! <i class="bi bi-lightbulb-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-12 col-md-6 mt-5 col-lg-4">
                <div class="card m-3 text-center rounded animate__animated animate__swing rounded">
                    <div class="card-body shadow">
                        <h5 class="card-title">Tipos de curitas</h5>
                        <div class="contenedor rounded">
                            <img class="imagen rounded mx-auto d-block" src="{{ asset('img/menu/challengue2.png') }}" alt="Image of trivia"
                                width="250px" height="250px">
                        </div>
                        <p class="card-text">Trivia con preguntas de curas.</p>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary ">Vamos!!! <i class="bi bi-lightbulb-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-12 col-md-6 mt-5 col-lg-4">
                <div class="card m-3 text-center rounded animate__animated animate__swing rounded">
                    <div class="card-body shadow">
                        <h5 class="card-title">Tipos de curitas</h5>
                        <div class="contenedor rounded">
                            <img class="imagen rounded mx-auto d-block" src="{{ asset('img/menu/challengue2.png') }}" alt="Image of trivia"
                                width="250px" height="250px">
                        </div>
                        <p class="card-text">Trivia con preguntas de curas.</p>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary ">Vamos!!! <i class="bi bi-lightbulb-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-12 col-md-6 col-lg-4">
                <div id="effect-hover">
                    <div class="img">
                        <img src="{{ asset('img/menu/challengue2.png') }}" class="img-fluid mx-auto d-block">
                        <div id="efecto">
                            <h2>Efecto</h2>
                            <p>Mis primeros auxilitos.</p>
                        </div>
                    </div>
                    </sectdivion>
                </div>
            </div> --}}
        </div>

    </div>


    <div class="">
        <ul class="pagination pagination-lg">
            <li class="page-item active mb-5" aria-current="page">
                <span class="page-link bg-light h4">1 2 3</span>
            </li>
        </ul>
    </div>




    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
</div>
