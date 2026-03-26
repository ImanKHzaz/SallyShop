@extends('layouts.app')

@section('title', 'تعديل الطلب - لوحة التحكم')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>
                <i class="fas fa-edit me-2 text-primary"></i>
                تعديل الطلب #{{ $order->id }}
            </h1>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                العودة للطلبات
            </a>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">تفاصيل الطلب</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">المستخدم</label>
                                <input type="text" class="form-control" value="{{ $order->user->name ?? 'غير محدد' }}"
                                    readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">الحالة</label>
                                <select name="status" class="form-control" required>
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>قيد المراجعة
                                    </option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>جاري
                                        التجهيز</option>
                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>تم الشحن
                                    </option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>مكتمل
                                    </option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>ملغي
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">المجموع الكلي</label>
                                <input type="number" step="0.01" name="total" class="form-control"
                                    value="{{ $order->total }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">عنوان التسليم</label>
                                <textarea name="shipping_address" class="form-control" rows="3">{{ $order->shipping_address }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                حفظ التغييرات
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">معلومات إضافية</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>رقم الهاتف:</strong> {{ $order->country_code }} {{ $order->phone_number }}</p>
                        <p><strong>طريقة الدفع:</strong>
                            {{ $order->payment_method == 'cod' ? 'الدفع عند التسليم' : 'شام كاش' }}</p>
                        <p><strong>تاريخ الإنشاء:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h5 class="mb-0">عناصر الطلب</h5>
                    </div>
                    <div class="card-body">
                        @foreach ($order->items as $item)
                            <div class="d-flex justify-content-between mb-2">
                                <span>{{ $item->product->name }}</span>
                                <span>{{ $item->quantity }} × {{ number_format($item->unit_price, 2) }} ر.س</span>
                            </div>
                        @endforeach
                        <hr>
                        <div class="d-flex justify-content-between">
                            <strong>المجموع:</strong>
                            <strong>{{ number_format($order->total, 2) }} ر.س</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
