<link id="image-head" rel="shortcut icon" href="{{ asset('img/menu/challengue2.png') }}" type="image/x-icon">
@section('title', 'Juegos')

<link rel="stylesheet" href="{{ asset('css/premium.css') }}" />
<x-app-layout>

    <x-slot name="header">
        <x-header />
    </x-slot>

   
              @if (auth()->check() && auth()->user()->subscription && auth()->user()->subscription->subscription_status === 'aprobado')
              <!-- La condición se cumple -->
              <div class="card m-4 text-center primera">
                <div class=" card-body shadow ">
                    <div class="h4">¿Ques es RCP?</div>
                    <div class="contenedor rounded">
                        <video controls width="850px" height="auto">
                            <source src="{{ asset('videos/videsuscripcion2.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de videos.
                        </video>
                    </div>
                </div>
            </div>

            <div class="card m-4 text-center segunda">
                <div class=" card-body shadow ">
                    <div class="h4">¿Ques es RCP?</div>
                    <div class="contenedor rounded">
                        <video controls width="850px" height="auto">
                            <source src="{{ asset('videos/vide-fondo-suscipcion.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de videos.
                        </video>
                    </div>
                </div>
            </div>

            <div class="card m-4 text-center tercera">
                <div class=" card-body shadow ">
                    <div class="h4">¿Ques es RCP?</div>
                    <div class="contenedor rounded">
                        <video controls width="850px" height="auto">
                            <source src="{{ asset('videos/videsuscripcion2.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de videos.
                        </video>
                    </div>
                </div>
            </div>
            <div class="card m-4 text-center cuarta">
                <div class=" card-body shadow ">
                    <div class="h4">¿Ques es RCP?</div>
                    <div class="contenedor rounded">
                        <video controls width="850px" height="auto">
                            <source src="{{ asset('videos/videsuscripcion2.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de videos.
                        </video>
                    </div>
                </div>
            </div>
            <div class="card m-4 text-center quinta">
                <div class=" card-body shadow ">
                    <div class="h4">¿Ques es RCP?</div>
                    <div class="contenedor rounded">
                        <video controls width="850px" height="auto">
                            <source src="{{ asset('videos/videsuscripcion2.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de videos.
                        </video>
                    </div>
                </div>
            </div>
            <div class="card m-4 text-center sexta">
                <div class=" card-body shadow ">
                    <div class="h4">¿Ques es RCP?</div>
                    <div class="contenedor rounded">
                        <video controls width="850px" height="auto">
                            <source src="{{ asset('videos/videsuscripcion2.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de videos.
                        </video>
                    </div>
                </div>
            </div>
           
          @else
       

        
          @endif

           




            </div>
        </div>
    </div>

    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>