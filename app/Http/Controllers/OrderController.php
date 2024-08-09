<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('products')->get();
        return view('orders.index', compact('orders'));
    }

    public function checkout()
    {
        $cartsInBasket = session()->get('cartsInBasket', []);
        $totalPrice = $this->getTotalPrice($cartsInBasket);

        $order = Order::create(['total_price' => $totalPrice]);
        foreach ($cartsInBasket as $productId => $product) {
            $order->products()->attach($productId, ['quantity' => $product['quantity']]);
        }

        session()->forget('cartsInBasket');
        return redirect()->route('orders.index')->with('success', 'Заказ успешен!');
    }

    public function setOrder() {
        $cartsInBasket = session()->get('cartsInBasket', []);
        if (empty($cartsInBasket)) {
            return redirect()->route('products.index')->with('error', 'Корзина пуста!');
        }
        $totalPrice = $this->getTotalPrice($cartsInBasket);

        return view('orders.set-order', compact('totalPrice'));
    }

    private function getTotalPrice($carts) {
        return array_reduce($carts, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
    }
}
