<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::latest()->paginate(12);
        return view('carts.index', compact('carts'));
    }

    public function create()
    {
        return view('carts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'status' => 'required|in:active,ordered,abandoned',
        ]);

        Cart::create($data);

        return redirect()->route('carts.index')->with('success', 'تم إنشاء السلة بنجاح');
    }

    public function show(Cart $cart)
    {
        return view('carts.show', compact('cart'));
    }

    public function edit(Cart $cart)
    {
        return view('carts.edit', compact('cart'));
    }

    public function update(Request $request, Cart $cart)
    {
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'status' => 'required|in:active,ordered,abandoned',
        ]);

        $cart->update($data);

        return redirect()->route('carts.index')->with('success', 'تم تحديث السلة بنجاح');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('carts.index')->with('success', 'تم حذف السلة بنجاح');
    }
}
