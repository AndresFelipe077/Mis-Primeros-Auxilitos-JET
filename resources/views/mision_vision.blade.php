<link id="image-head" rel="shortcut icon" href="{{ asset('img/icons/mision-vision.png') }}" type="image/x-icon">
<link rel="stylesheet" href="{{asset("css/mision-vision.css")}}">
@section('title', 'Misión - Visión')
<x-app-layout>

    <x-slot name="header">
        {{-- <x-header /> --}}
    </x-slot>

    <div class="container animate__animated animate__bounceInDown">

        <div class="text-center">
            <div class="mt-3">
                <x-jet-authentication-card-logo />
            </div>
            <h1 class="text-center">Mis Primeros Auxilitos</h1>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="card m-4 text-center h-100 align-items-stretch">
                    <div class="card-body shadow">
                        <h5 class="card-title">Misión</h5>
                        <div class="contenedor rounded">
                            <img class="imagen rounded img-fluid mx-auto d-block" src="{{asset('img/icons/mision.png')}}" alt="Image of mision" width="250px" height="250px">
                        </div>
                        <p class="card-text">Brindar a nuestros niños una educación integral en primeros auxilios preparándolos frente a cualquier dificultad o emergencia, utilizando herramientas didácticas y tecnológicas para desarrollar toda su capacidad, para que sean los héroes del mañana. </p>
                    </div>
                </div>
            </div>
        
            <div class="col-sm-6">
                <div class="card m-4 text-center h-100 align-items-stretch">
                    <div class="card-body shadow">
                        <h5 class="card-title">Visión</h5>
                        <div class="contenedor rounded">
                            <img class="imagen rounded img-fluid mx-auto d-block" src="{{asset('img/icons/vision.png')}}" alt="Image of vision" width="250px" height="250px">
                        </div>
                        <p class="card-text">Para el año 2024 los niños estarán preparados para prestar servicios en primeros auxilios y capacitados para poder reaccionar a un evento de emergencia.</p>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="text-center mb-5">
                      
            <img class="mx-auto" src="{{ asset('img/icons/house.png') }}" alt="Home" height="100px" width="100px" onclick="location.href='{{ route('dashboard.index') }}'">
        
        </div>
        <a href="#" class="boton-espacio">Manual de usuario</a>
        <a href="#" class="boton-arcoiris">Manual técnico</a>
    </div>

    <x-slot name="footer">
        {{-- <x-footer /> --}}
    </x-slot>

</x-app-layout>
