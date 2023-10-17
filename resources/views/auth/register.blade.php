<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
    <title>Registro</title>

    <link id="image-head" rel="shortcut icon" href="{{ asset('img/registro/faviconRegistro.png') }}" type="image/x-icon">

    {{-- Estilos --}}
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>

    <div class="container">
        <div class="containerP">
            
            <div class="slider-container">

                <ul class="slider">
                  <li class="slide"><img src="{{ asset('img/logo/logo.png')}}" alt="Imagen 1"></li>
                  <li class="slide"><img src="{{ asset('img/imgs/policia.png')}}" alt="Imagen 2"></li>
                  <li class="slide"><img src="{{ asset('img/imgs/imagenavatar1.png  ')}}" alt="Imagen 3"></li>
                </ul>

                <div class="slider-controls">
                    <a class="prev-slide">
                        <div class="flecha ">
                            <div class="flecha-punta"></div>
                            <div class="flecha-cuerpo"></div>
                        </div>  
                    </a>
                    <a class="next-slide">
                        <div class="flecha2 ">
                            <div class="flecha-punta2"></div>
                            <div class="flecha-cuerpo2"></div>
                        </div>  
                    </a>
                  </div>
                
                  <div class="slide-indicators">
                    <!-- Los indicadores se generarán dinámicamente con JavaScript -->
                  </div>

              </div>
        
            <div id="container-login" class="div-formulario">

                <form action="{{ route('register') }}" method="POST" id="formulario" class="formulario">
                    @csrf

                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            <ul>
                                <strong>* {{ $error }}</strong>
                            </ul>
                        @endforeach
                    </div>
                @endif

                    <div class="titulo">
                        <h1 class="title">Registro</h1>
                    </div>
                    
                   

                    <div class="input-group">
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                        <label class="lbl" for="name"><span class="text">Nombre</span></label>
                    </div>
                    
                    <div class="input-group">
                        <input type="text" name="email" id="name"  required>
                        <label class="lbl" for="input"><span class="text">Correo</span></label>
                    </div>
                    
                
                    <div class="check-group">
                        <input type="checkbox" id="check1" name="genero" value="Masculino">
                        <label for="check1">Masculino</label>
                        
                        <input type="checkbox" id="check2" name="genero" value="Femenino">
                        <label for="check2">Femenino</label>
                        
                        <input type="checkbox" id="check3" name="genero" value="Otro">
                        <label for="check3">Otro</label>
                    </div>
            
               
                    <div class="input-group">
                        {{-- <input type="date"  name="fechaNacimiento" id="date" value="{{ old('fechaNacimiento') }}" placeholder="" required>
                        <label class="lbl" for="input"><span class="text">Fecha de nacimiento</span></label> --}}

                        <input type="text" name="fehcaNacimiento" id="date" value="{{old('fechaNacimiento')}}" onclick="cambiarTipo()" required />
                        <label for="input" class="lbl"><span class="text">Fecha de nacimiento</span></label>
                    </div>
            
              
                    <div class="input-group">
                        <input type="password" name="password" id="name password" required>
                        <label class="lbl" for="input"><span class="text">Contraseña</span></label>
                    </div>
            
                    
                    <div class="input-group">
                        <input type="password" name="password_confirmation" id="name password" required>
                        <label class="lbl" for="input"><span class="text">Confirmar contraseña</span></label>
                    </div>


                    @if ($errors->any('password'))
                    <div class="text-danger" role="alert">
                        <p class="text-center m-3">Las constraseñas deben coincidir, ser mayores o iguales
                            a 8
                            carácteres 😀😎</p>
                    </div>
                @endif

                <div class="grupo">
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div>
                            <x-jet-label for="terms">
                                <div class="row">

                                    <div class="ml-3">
                                        <x-jet-checkbox name="terms" required />

                                    </div>

                                    <div class="ml-3">
                                        {!! __('Estoy de acuerdo con los :terms_of_service y :privacy_policy', [
                                            'terms_of_service' =>
                                                '<a target="_blank" href="' .
                                                route('terms.show') .
                                                '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                __('Terminos de servicio') .
                                                '</a>',
                                            'privacy_policy' =>
                                                '<a target="_blank" href="' .
                                                route('policy.show') .
                                                '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                __('Politica de privacidad') .
                                                '</a>',
                                        ]) !!}
                                    </div>


                                </div>
                            </x-jet-label>
                        </div>
                    @endif
                </div>

            
                
                    <div class="input-group">
                        <button class="button">
                            <span class="button-content">Registrarse </span>
                        </button>
                    </div>

                   
                </form>
            </div>
        </div>
        
    </div>

</body>
<script src="{{ asset('js/register.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</html>
