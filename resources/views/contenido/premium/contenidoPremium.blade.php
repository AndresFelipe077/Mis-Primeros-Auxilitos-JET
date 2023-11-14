<link id="image-head" rel="shortcut icon" href="{{ asset('img/menu/challengue2.png') }}" type="image/x-icon">
@section('title', 'Juegos')

<link rel="stylesheet" href="{{ asset('css/premium.css') }}" />
<x-app-layout>

    <x-slot name="header">
        <x-header />
    </x-slot>


              @if (auth()->check() && auth()->user()->subscription && auth()->user()->subscription->subscription_status === 'aprobado')
              <!-- La condición se cumple -->
              <div class="container">
              <div class="">
                <div class=" card">
                    <div class="h4">¿Ques es RCP?</div>
                    <div class="contenedor rounded">
                        <video controls width="850px" height="auto">
                            <source src="{{ asset('videos/videsuscripcion2.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de videos.
                        </video>
                    </div>
                </div>
            </div>

            <div class="">
                <div class=" card">
                    <div class="h4">¿Ques es RCP?</div>
                    <div class="contenedor rounded">
                        <video controls width="850px" height="auto">
                            <source src="{{ asset('videos/vide-fondo-suscipcion.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de videos.
                        </video>
                    </div>
                </div>
            </div>

            <div class="">
                <div class=" card">
                    <div class="h4">¿Ques es RCP?</div>
                    <div class="contenedor rounded">
                        <video controls width="850px" height="auto">
                            <source src="{{ asset('videos/videsuscripcion2.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de videos.
                        </video>
                    </div>
                </div>
            </div>
            <div class="">
                <div class=" card">
                    <div class="h4">¿Ques es RCP?</div>
                    <div class="contenedor rounded">
                        <video controls width="850px" height="auto">
                            <source src="{{ asset('videos/videsuscripcion2.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de videos.
                        </video>
                    </div>
                </div>
            </div>
            <div class="">
                <div class=" card">
                    <div class="h4">¿Ques es RCP?</div>
                    <div class="contenedor rounded">
                        <video controls width="850px" height="auto">
                            <source src="{{ asset('videos/videsuscripcion2.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de videos.
                        </video>
                    </div>
                </div>
            </div>
            <div class="">
                <div class=" card">
                    <div class="h4">¿Ques es RCP?</div>
                    <div class="contenedor rounded">
                        <video controls width="850px" height="auto">
                            <source src="{{ asset('videos/videsuscripcion2.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de videos.
                        </video>
                    </div>
                </div>
            </div>
            <div class="">
                <div class=" card">
                    <div class="h4">¿Ques es RCP?</div>
                    <div class="contenedor rounded">
                        <video controls width="850px" height="auto">
                            <source src="{{ asset('videos/videsuscripcion2.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de videos.
                        </video>
                    </div>
                </div>
            </div>
            <div class="">
                <div class=" card">
                    <div class="h4">¿Ques es RCP?</div>
                    <div class="contenedor rounded">
                        <video controls width="850px" height="auto">
                            <source src="{{ asset('videos/videsuscripcion2.mp4') }}" type="video/mp4">
                            Tu navegador no soporta la reproducción de videos.
                        </video>
                    </div>
                </div>
            </div>

        </div>
           
          @else
       

        
          @endif

           




            </div>
        </div>
    </div>


    {{-- <div id="paypal-button-container-P-66S47642J3354442YMVAZHCQ"></div>
    <script src="https://www.paypal.com/sdk/js?client-id=AUgDyfyqBycdUb_XUsANjBmAuHfJxUHAgx2ZStgncmUrraGbz8Y_8cRZZV8MDSQz_qnKGe9307b-fPOe&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
    <script>
      paypal.Buttons({
          style: {
              shape: 'pill',
              color: 'gold',
              layout: 'vertical',
              label: 'subscribe'
          },
          createSubscription: function(data, actions) {
            return actions.subscription.create({
              /* Creates the subscription */
              plan_id: 'P-66S47642J3354442YMVAZHCQ'
            });
          },
          onApprove: function(data, actions) {
            alert(data.subscriptionID); // You can add optional success message for the subscriber here
          }
      }).render('#paypal-button-container-P-66S47642J3354442YMVAZHCQ'); // Renders the PayPal button
    </script> --}}






    <x-slot name="footer">
        <x-footer />
    </x-slot>




</x-app-layout>