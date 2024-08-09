<!DOCTYPE html>
<html>
<head>
    <title>Каталог товаров</title>
</head>
<body>
<h1>Каталог товаров</h1>

@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<div>
    @php
        $cartsInBasket = session()->get('cartsInBasket', [])
    @endphp
    @foreach ($products as $product)
        <div>
            <h2>{{ $product->name }}</h2>
            <p>Цена: {{ $product->price }}$</p>
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" value="{{$cartsInBasket[$product->id]['quantity'] ?? 1}}" min="1">
                <button type="submit">Добавить в корзину</button>
            </form>
        </div>
    @endforeach
</div>
<div>
    <h2><a href="{{ route('orders.set') }}">Оформить заказ</a></h2>
</div>
<h1><a href="{{ route('orders.index') }}">Перейти к заказам</a></h1>
</body>
</html>
