<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartsInBasket = session()->get('cartsInBasket', []);
        $id = $validated['product_id'];
        if (isset($cartsInBasket[$id])) {
            $cartsInBasket[$id]['quantity'] = $validated['quantity'];
        } else {
            $product = Product::find($id);
            $cartsInBasket[$id] = [
                'name' => $product->name,
                'quantity' => $validated['quantity'],
                'price' => $product->price,
            ];
        }

        session()->put('cartsInBasket', $cartsInBasket);
        return redirect()->back()->with('success', 'Товар добавлен в корзину!');
    }
}
