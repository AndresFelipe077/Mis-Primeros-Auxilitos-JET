<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Agradecimiento por la Suscripción</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/suscripcion.css') }}">
</head>
<body>
    <div class="video-background">
        <video autoplay loop muted>
            <source src="{{ asset('videos/vide-fondo-suscipcion.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div class="modal-background" id="modalBackground">
        <div class="modal">
            <h2>Muchas gracias por tu suscripción</h2>
            <p>Bienvenidos a la mejor diversión y enseñanza para nuestros hijos. Son el futuro del mundo y nuestros héroes del mañana.</p>
            <a href="{{ route('dashboard.index') }}" class="modal-button">Sigue y diviértete</a>
        </div>
    </div>

    <script>
        const modalBackground = document.getElementById('modalBackground');
        modalBackground.style.display = 'block';
    </script>
</body>
</html>
