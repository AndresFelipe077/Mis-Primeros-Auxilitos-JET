<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal JS SDK Subscription Integration</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AUtEzyJARwUiSv7wWujpVtYerulyE1tTVqidHakgKZNEDll69IqICzgmhkO3bHHj7LGC3Tg3j6f_8XE_"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pagos.css') }}">
    <!-- Agrega enlaces a Bootstrap CSS y JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="payment-card">
        <h1><span>M</span><span>i</span><span>s</span> <span>p</span><span>r</span><span>i</span><span>m</span><span>e</span><span>r</span><span>o</span><span>s</span> <span>A</span><span>u</span><span>x</span><span>i</span><span>l</span><span>i</span><span>t</span><span>o</span><span>s</span></h1>
        <h2><span>s</span><span>u</span><span>s</span><span>c</span><span>r</span><span>i</span><span>b</span><span>e</span><span>t</span><span>e</span></h2>
        
        <p class="price">Total a pagar: $8.00</p>

        <div id="paypal-button-container"></div>

        <script>
            paypal.Buttons({
                style: {
                    color: 'blue',
                    shape: 'pill',
                    label: 'pay'
                },
                createOrder: function (data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '8'
                            }
                        }]
                    });
                },
                onApprove: function (data, actions) {
                    actions.order.capture().then(function (detalles) {
                        // Realiza una solicitud POST para crear un registro de suscripción
                        // con el ID del usuario y el estado de aprobado
                        fetch("{{ route('crearSuscripcion') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: new URLSearchParams({ userId: {{ auth()->id() }}, status: 'aprobado' })
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Abre el modal automáticamente cuando se aprueba el pago
                            $('#downloadModal').modal('show');
                        });
                    });
                },
                onCancel: function (data) {
                    alert("Pago cancelado");
                    console.log(data);
                }
            }).render('#paypal-button-container');
        </script>
    </div>

    <a href="{{ url('dashboard') }}">
        <img class="helicoptero" src="{{ asset('img/logo/logo.png') }}" alt="Admin" width="50px" height="50px">
    </a>
<!-- Modal para preguntar al usuario si desea descargar el PDF -->
<div class="modal" id="downloadModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Descargar Recibo PDF</h4>
            </div>
            <div class="modal-body">
                <p>¿Desea descargar el recibo PDF?</p>
            </div>
            <div class="modal-footer">
                <a href="{{ url('/generar-recibo-pdf/' . auth()->id()) }}" class="btn btn-primary" onclick="downloadAndRedirect('yes')">Sí</a>
                <button class="btn btn-secondary" data-dismiss="modal" onclick="downloadAndRedirect('no')">No</button>
            </div>
        </div>
    </div>
</div>


<script>
    function downloadAndRedirect(choice) {
        if (choice === 'yes') {
            // Descargar el PDF (ya está en el enlace del botón "Sí")
            // Cierra el modal
            $('#downloadModal').modal('hide');
            // Redirige al usuario a la página de suscripciones después de 1 segundo
            setTimeout(function() {
                window.location.href = "{{ route('suscripcion') }}";
            }, 1000);
        } else if (choice === 'no'){
            setTimeout(function() {
                window.location.href = "{{ route('suscripcion') }}";
            }, 1000);
        }
    }
</script>
</body>
</html>
