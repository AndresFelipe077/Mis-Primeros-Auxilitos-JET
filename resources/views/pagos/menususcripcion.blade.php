<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Primeros Auxilios - Suscripción</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menususcripcion.css') }}">
</head>
<body>
    <header>
        <h1>Bienvenido a Mis Primeros Auxilitos</h1>
        <p class="slogan">Enseñando al héroe del mañana</p>
    </header>

    <section class="subscription-info">
        <h2>¿Por qué suscribirte?</h2>
        <div class="subscription-card">
            <h3>Contenido Ilimitado</h3>
            <p>Accede a una amplia variedad de contenido educativo y divertido para tus hijos.</p>
        </div>

        <div class="subscription-card">
            <h3>Juegos Exclusivos</h3>
            <p>Ofrecemos juegos emocionantes y educativos que no encontrarás en ningún otro lugar.</p>
        </div>

        <div class="subscription-card dos">
            <h3>Videos e Imágenes Exclusivas</h3>
            <p>Disfruta de contenido multimedia exclusivo que inspirará y entretendrá a tus hijos.</p>
        </div>
    </section>
    <a href="{{ url('/pagos') }}" class="subscribe-button">¡Adquiérelo ya!</a>


</body>
</html>
