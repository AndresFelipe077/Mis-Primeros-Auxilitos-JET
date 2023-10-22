<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Footer Morado</title>
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>

    {{-- imagen con movimiento  --}}
  
        <img class="logo" src="{{ asset('img/icons/imagen de logo.png') }}" alt="Admin" width="50px" height="50px">
 
    <!-- Contenido de tu página aquí -->

    <!-- Footer -->
    <div class="footer">
        <nav class="footer">
            <div class="navbar1 bg-info">
                <div class="hijos-navbar">
                    <img  class="iamgenes footer"  src="{{ asset('img/icons/casa.barra-footer-removebg-preview.png') }}" onclick="location.href='{{ route('dashboard.index') }}'">
                </div>
                <div class="hijos-navbar">
                    <img class="iamgenes footer"  src="{{ asset('img/menu/challengue2.png') }}"
                        onclick="location.href='{{ route('dashboard.game') }}'">
                </div>

                <div class="hijos-navbar">
                    <img class="iamgenes2"  type="button" src="{{ asset('img/menu/microphone2.png') }}"
                        data-bs-toggle="modal" data-bs-target="#microphone">{{--exampleModal--}}
                </div>

                <div class="hijos-navbar">
                    <img class="iamgenes3" src= "{{ asset('img/menu/settings2.png') }}"
                        onclick="location.href='{{ route('dashboard.ajustes') }}'">
                </div>
            </div>
        </nav>
    </div>
</body>
</html>
