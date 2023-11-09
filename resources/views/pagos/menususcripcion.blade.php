<link id="image-head" rel="shortcut icon" href="{{ asset('img/menu/challengue2.png') }}" type="image/x-icon">
@section('title', 'menu suscripcion')
<x-app-layout>
    <x-slot name="header">
        <x-header />
    </x-slot>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mis Primeros Auxilios - Suscripción</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/menususcripcion.css') }}">
          <a href="{{ url('/pagos') }}" class="subscribe-button">¡Adquiérelo ya!</a>
    </head>
    <body>
        <h2>¿Por qué suscribirte?</h2>
        <section class="subscription-info primera">
    

            <!-- Tarjeta 1 con imagen y texto -->
            <div class="subscription-card segunda">
                <img src="{{ asset('img/card 2.jpg') }}" alt="Imagen 1">
                <h3>Contenido Ilimitado</h3>
                <p>Accede a una amplia variedad de contenido educativo y divertido para tus hijos.</p>
            </div>

            <!-- Tarjeta 2 con imagen y texto -->
            <div class="subscription-card tercera">
                <img src={{ asset('img/1971-infantiles.jpg') }} alt="Imagen 2">
                <h3>Juegos Exclusivos</h3>
                <p>Ofrecemos juegos emocionantes y educativos que no encontrarás en ningún otro lugar.</p>
            </div>

            <!-- Tarjeta 3 con imagen y texto -->
            <div class="subscription-card cuarta">
                <img src="{{ asset('img/istockphoto-539281953-612x612.jpg') }}" alt="Imagen 3">
                <h3>Videos e Imágenes Exclusivas</h3>
                <p>Disfruta de contenido multimedia exclusivo que inspirará y entretendrá a tus hijos.</p>
            </div>
        
        </section>
    
    </body>
    </html>
    <x-slot name="footer">
        <x-footer />
    </x-slot>
</x-app-layout>
