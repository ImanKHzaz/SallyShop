<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    /**
     * إضافة منتج للسلة
     */
    public function addToCart(Request $request, Product $product)
    {
        if ($product->quantity <= 0) {
            return redirect()->back()->with('error', 'المنتج غير متوفر حالياً.');
        }

        $user = Auth::user();

        // البحث عن سلة نشطة للمستخدم
        $cart = Cart::where('user_id', $user->id)
            ->where('status', 'active')
            ->first();

        // إنشاء سلة جديدة إذا لم تكن موجودة
        if (!$cart) {
            $cart = Cart::create([
                'user_id' => $user->id,
                'status' => 'active',
            ]);
        }

        // البحث عن المنتج في السلة
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            // زيادة الكمية إذا كان المنتج موجوداً
            $cartItem->increment('quantity');
        } else {
            // إضافة منتج جديد للسلة
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'تم إضافة المنتج للسلة بنجاح!');
    }

    /**
     * عرض السلة
     */
    public function showCart()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)
            ->where('status', 'active')
            ->with('items.product')
            ->first();

        return view('cart.index', ['cart' => $cart]);
    }

    /**
     * حذف منتج من السلة
     */
    public function removeFromCart(CartItem $item)
    {
        $item->delete();
        return redirect()->back()->with('success', 'تم حذف المنتج من السلة.');
    }

    /**
     * عرض صفحة الدفع
     */
    public function checkout()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)
            ->where('status', 'active')
            ->with('items.product')
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('products.index')->with('error', 'السلة فارغة.');
        }

        $total = $cart->items->sum(fn($item) => $item->quantity * $item->price);

        return view('checkout.index', ['cart' => $cart, 'total' => $total]);
    }

    /**
     * معالجة الدفع
     */
    public function processPayment(Request $request)
    {
        $validated = $request->validate([
            'payment_method' => ['required', 'in:sham_cash,cod'],
            'phone_number' => ['required', 'regex:/^\d{9,15}$/'],
            'country_code' => ['required', 'in:+966,+971,+962,+961,+970,+20'],
        ], [
            'payment_method.required' => 'يضرور اختيار طريقة دفع.',
            'phone_number.required' => 'رقم الهاتف مطلوب.',
            'phone_number.regex' => 'رقم الهاتف يجب أن يكون بين 9 و 15 رقم.',
            'country_code.required' => 'رمز الدولة مطلوب.',
            'country_code.in' => 'رمز الدولة غير صحيح.',
        ]);

        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)
            ->where('status', 'active')
            ->with('items')
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('products.index')->with('error', 'السلة فارغة.');
        }

        $total = $cart->items->sum(fn($item) => $item->quantity * $item->price);

        // إنشاء الطلب
        $order = $user->orders()->create([
            'cart_id' => $cart->id,
            'status' => 'pending',
            'total' => $total,
            'shipping_address' => $user->address ?? 'لم يتم تحديد عنوان',
            'payment_method' => $validated['payment_method'],
            'phone_number' => $validated['phone_number'],
            'country_code' => $validated['country_code'],
            'payment_status' => $validated['payment_method'] === 'cod' ? 'pending' : 'completed',
        ]);

        // نسخ عناصر السلة إلى الطلب
        foreach ($cart->items as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'unit_price' => $item->price,
            ]);
        }

        // تحديث حالة السلة
        $cart->update(['status' => 'ordered']);

        return redirect()->route('order.confirmation', $order)
            ->with('success', 'تم إنشاء الطلب بنجاح!');
    }

    /**
     * تأكيد الطلب
     */
    public function orderConfirmation($orderId)
    {
        $order = auth()->user()->orders()->with('items.product')->findOrFail($orderId);

        return view('checkout.confirmation', ['order' => $order]);
    }
}
