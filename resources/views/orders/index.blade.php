<!DOCTYPE html>
<html>
<head>
    <title>Заказы</title>
</head>
<body>
<h1>Список заказов</h1>

@foreach ($orders as $order)
    <div>
        <h2>Заказ №{{ $order->id }}</h2>
        <p>Дата: {{ $order->created_at }}</p>
        <p>Товары: {{ implode(', ', $order->products->pluck('name')->toArray()) }}</p>
        <p>Общая стоимость: {{ $order->total_price }}$</p>
    </div>
@endforeach

<h2><a href="{{ route('products.index') }}">Вернуться к товарам</a></h2>
</body>
</html>
