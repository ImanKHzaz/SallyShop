<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(12);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'cart_id' => 'nullable|exists:carts,id',
            'status' => 'required|in:pending,processing,shipped,completed,cancelled',
            'total' => 'required|numeric|min:0',
            'shipping_address' => 'nullable|string|max:500',
        ]);

        Order::create($data);

        return redirect()->route('orders.index')->with('success', 'تم إنشاء الطلب بنجاح');
    }

    public function show(Order $order)
    {
        $order->load('user');
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $order->load('user');
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'cart_id' => 'nullable|exists:carts,id',
            'status' => 'required|in:pending,processing,shipped,completed,cancelled',
            'total' => 'required|numeric|min:0',
            'shipping_address' => 'nullable|string|max:500',
        ]);

        $oldStatus = $order->status;
        $order->update($data);

        // إرسال رسالة واتس إذا تغيرت الحالة
        if ($oldStatus !== $data['status']) {
            $whatsAppService = new WhatsAppService();
            $whatsAppService->sendOrderStatusUpdate($order);
        }

        return redirect()->route('orders.index')->with('success', 'تم تحديث الطلب بنجاح');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'تم حذف الطلب بنجاح');
    }
}
