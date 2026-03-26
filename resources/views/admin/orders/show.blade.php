@extends('layouts.app')

@section('title', 'عرض الطلب - لوحة التحكم')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>
                <i class="fas fa-eye me-2 text-primary"></i>
                عرض الطلب #{{ $order->id }}
            </h1>
            <div>
                <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-primary">
                    <i class="fas fa-edit me-2"></i>
                    تعديل
                </a>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    العودة للطلبات
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">تفاصيل الطلب</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>المستخدم:</strong> {{ $order->user->name ?? 'غير محدد' }}</p>
                                <p><strong>البريد الإلكتروني:</strong> {{ $order->user->email ?? 'غير محدد' }}</p>
                                <p><strong>رقم الهاتف:</strong> {{ $order->country_code }} {{ $order->phone_number }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>الحالة:</strong>
                                    <span
                                        class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'pending' ? 'warning' : ($order->status == 'cancelled' ? 'danger' : 'info')) }}">
                                        @switch($order->status)
                                            @case('pending')
                                                قيد المراجعة
                                            @break

                                            @case('processing')
                                                جاري التجهيز
                                            @break

                                            @case('shipped')
                                                تم الشحن
                                            @break

                                            @case('completed')
                                                مكتمل
                                            @break

                                            @case('cancelled')
                                                ملغي
                                            @break
                                        @endswitch
                                    </span>
                                </p>
                                <p><strong>طريقة الدفع:</strong>
                                    {{ $order->payment_method == 'cod' ? 'الدفع عند التسليم' : 'شام كاش' }}</p>
                                <p><strong>حالة الدفع:</strong> {{ $order->payment_status }}</p>
                            </div>
                        </div>

                        <hr>

                        <h5>عنوان التسليم</h5>
                        <p>{{ $order->shipping_address ?: 'غير محدد' }}</p>

                        <hr>

                        <h5>عناصر الطلب</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>المنتج</th>
                                        <th>الكمية</th>
                                        <th>السعر</th>
                                        <th>المجموع</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->items as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($item->unit_price, 2) }} ر.س</td>
                                            <td>{{ number_format($item->quantity * $item->unit_price, 2) }} ر.س</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">المجموع الكلي</th>
                                        <th>{{ number_format($order->total, 2) }} ر.س</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">معلومات إضافية</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>تاريخ الإنشاء:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>
                        <p><strong>آخر تحديث:</strong> {{ $order->updated_at->format('Y-m-d H:i:s') }}</p>
                        <p><strong>معرف السلة:</strong> {{ $order->cart_id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
