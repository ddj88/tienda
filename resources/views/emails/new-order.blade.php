<!Doctype html>
<html>
<head>
    <title> nuevo pedido</title>

</head>
<body>
<p>resumen del pedido</p>

<ul>
    <li>
        <strong>Nombre</strong>
        {{$user->name}}
        </li>
    <li><strong>email</strong>
    {{$user->email}}
    </li>
    <li><strong>fecha pedidio</strong>
    {{$cart->order_date}}

    </li>
    <hr><hr>

    <p>detalles del pedido</p>
    <li>
        <ul>
            @foreach($cart->details as $detail)

            <li>
                {{$detail->product->name}} x {{$detail->quantity}}
                ({{$detail->quantity}} * {{$detail->product->price}})

            </li>

            @endforeach


            <p><strong>importe a pagar</strong> {{$cart->total}}</p>








        </ul>


    </li>



</ul>

        <a href="{{ url('/admin/order/.$card->id.') }}"> ver mas info</a>

</body>
</html>
