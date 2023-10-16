<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal JS SDK Subscription Integration</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AUtEzyJARwUiSv7wWujpVtYerulyE1tTVqidHakgKZNEDll69IqICzgmhkO3bHHj7LGC3Tg3j6f_8XE_"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pagos.css') }}">

</head>
<body>
    <div class="payment-card">
        <h1><span>M</span><span>i</span><span>s</span> <span>p</span><span>r</span><span>i</span><span>m</span><span>e</span><span>r</span><span>o</span><span>s</span> <span>A</span><span>u</span><span>x</span><span>i</span><span>l</span><span>i</span><span>t</span><span>o</span><span>s</span></h1>
        <h2><span>s</span><span>u</span><span>s</span><span>c</span><span>r</span><span>i</span><span>b</span><span>e</span><span>t</span><span>e</span></h2>
        
        <p class="price">Total a pagar: $25.00</p>

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
                                value: '25'
                            }
                        }]
                    });
                },
                onApprove: function (data, actions) {
                    actions.order.capture().then(function (detalles) {
                        window.location.href = "{{ route('suscripcion') }}";
                    });
                },
                onCancel: function (data) {
                    alert("Pago cancelado");
                    console.log(data);
                }
            }).render('#paypal-button-container');
        </script>
    </div>
</body>
<a href="{{ url('dashboard') }}">
    <img class="helicoptero" src="{{ asset('img/logo/logo.png') }}" alt="Admin" width="50px" height="50px">
</a>
</html>
