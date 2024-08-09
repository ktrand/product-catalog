<!DOCTYPE html>
<html>
<head>
    <title>Оформление заказа</title>
</head>
<body>
<h1>Оформление заказа</h1>

<div>
    @php
        $cartsInBasket = session()->get('cartsInBasket', [])
    @endphp
    @foreach ($cartsInBasket as $cart)
        <div>
            <h3>{{ $cart['name'] }}, количество: {{$cart['quantity']}}, цена: {{ $cart['price'] }}$</h3>
        </div>
    @endforeach
    <h2>Общая стоимость: {{ $totalPrice }}$</h2>
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <button type="submit">Оформить заказ</button>
    </form>
</div>

<h2><a href="{{ route('products.index') }}">Вернуться к товарам</a></h2>
</body>
</html>
