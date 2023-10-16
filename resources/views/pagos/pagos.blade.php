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
        <h2>Realizar Pago</h2>
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
</html>
