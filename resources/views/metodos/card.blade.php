<?php
// SDK de Mercado Pago
require base_path('vendor/autoload.php');
// Agrega credenciales
MercadoPago\SDK::setAccessToken('MP_ACCESS_TOKEN');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 75;
$preference->items = [$item];
$preference->save();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <div class="contenido4">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mis primeros Auxilitos</title>
        <link type="text/javascript" src="{{ asset('js/scrip.js') }}">
        <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
        <link id="image-head" rel="shortcut icon" href="{{ asset('img/imgs/jhon.png.jpg') }}" type="image/x-icon">
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</head>

<body class="bg-light">
    <div class="container">
        <main>
            <div class="texto">
                <img class="d-block mx-auto mb-4" src="img/logo.png" alt="" width="160" height="120">
                <h2>Mis Primeros Auxilitos</h2>
                <p class="lead">A través del presente formulario de suscripción podrás adquirir los productos
                    de Mis Primeros Auxlitios en este sitio.</p>
            </div>
            <div class="cho-container">
            </div>
    </div>
    </main>
    <!--   Tarjetas-->
    <div class="targetas2">
        <div class="container-card">
            <div class="card">
                <figure>
                    <img src="img/logos.svg">
                </figure>
                <div class="contenido-card">
                    <h3>Suscripción mensual</h3>
                    <p> Abquiere nuestra mas grandiosa variedad de contenido exclusivo para tus hijos. Nuestros herores
                        del mañana. </p>

                </div>
            </div>

            <div class="card">
                <figure>
                    <img src="img/cash-coin.svg">
                </figure>
                <div class="contenido-card">
                    <h3>Suscripción Trimestral</h3>
                    <p>aprovecha esta mega oferta y lleva 3 meses con un 10% de descuento no te lo pierdas.</p>

                </div>
            </div>
            <div class="card">
                <figure>
                    <img src="img/currency-exchange.svg">
                </figure>
                <div class="contenido-card">
                    <h3>Suscripción anual</h3>
                    <p>Ahorra hasta un 25% de descuento en tu cargo final por la mejor educacion de tu hijo recuerda que
                        son nuesra esperanza para el futuro </p>

                </div>
            </div>
        </div>
    </div>

    <div class="row g-2">
        <div class="separacion">
            <div class="col-md-1 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <div class="targeta5">
                        <span>Metodo depago Mercado pago</span>
                    </div>
                    <span class="badge bg-primary rounded-pill">4</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div class="n1">
                            <h6 class="my-0"> Nombre del Producto</h6>
                            <small class="text-muted">Mis primeros Auxilitos</small>
                        </div>
                        <span class="text-muted">COP 20.000 </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div class="n2">
                            <h6 class="my-0">Mensual</h6>
                            <small class="text-muted">Breve suscripción</small>
                        </div>
                        <span class="text-muted">COP 40.000</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div class="n3">
                            <h6 class="my-0">Trimestral</h6>
                            <small class="text-muted">Breve descripción</small>
                        </div>
                        <span class="text-muted">$5</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div class="n4">
                            <h6 class="my-0">Promocion de codigo</h6>
                            <small class="text-muted">hasta el 100% de descuento</small>
                        </div>
                        <span class="text-muted">-$5</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <span class="n5">Total (USD)</span>
                        <strong>$20</strong>
                    </li>
                </ul>
            </div>
        </div>


        {{-- meodo de pago de mercado libre instlacion de credenciales  --}}


        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

        <script src="{{ asset('js/form-validation.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <div class="cho-container"></div>
        <script>
            const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
                locale: 'es-AR'
            });

            mp.checkout({
                preference: {
                    id: '{{ $preference->id }}'
                },
                render: {
                    container: '.cho-container',
                    label: 'Pagar',
                }
            });
        </script>
    </div>
</body>
</div>

</html>
