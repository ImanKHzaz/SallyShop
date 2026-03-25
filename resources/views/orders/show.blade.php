@extends('layouts.app')

@section('title', 'عرض الطلب - SallyShop')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0">
                <div class="card-header bg-info text-white border-0">
                    <h3 class="mb-0"><i class="fas fa-eye me-2"></i>عرض الطلب</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center mb-3">
                            <i class="fas fa-receipt fa-5x text-primary"></i>
                        </div>
                        <div class="col-md-9">
                            <h4 class="text-primary mb-3">الطلب رقم {{ $order->id }}</h4>
                            <hr>
                            <p><i class="fas fa-ring me-2 text-muted"></i><strong>الحالة:</strong>
                                <span
                                    class="badge {{ $order->status === 'pending' ? 'bg-warning' : ($order->status === 'processing' ? 'bg-info' : ($order->status === 'completed' ? 'bg-success' : 'bg-danger')) }}">
                                    {{ $order->status }}
                                </span>
                            </p>
                            <p><i class="fas fa-dollar-sign me-2 text-muted"></i><strong>المجموع:</strong> <span
                                    class="text-success fw-bold">{{ number_format($order->total, 2) }} ر.س</span></p>
                            <p><i class="fas fa-user me-2 text-muted"></i><strong>المستخدم:</strong>
                                {{ $order->user?->name ?? 'لا يوجد' }}</p>
                            <p><i class="fas fa-list me-2 text-muted"></i><strong>عدد الأصناف:</strong>
                                {{ $order->items->count() }}</p>
                            <p><i class="fas fa-map-marker-alt me-2 text-muted"></i><strong>عنوان الشحن:</strong>
                                {{ $order->shipping_address ?? 'غير متوفر' }}</p>
                            <p><i class="fas fa-calendar me-2 text-muted"></i><strong>تاريخ الطلب:</strong>
                                {{ $order->created_at->format('Y-m-d H:i') }}</p>
                            <p><i class="fas fa-clock me-2 text-muted"></i><strong>منذ:</strong>
                                {{ $order->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex gap-2">
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary"><i
                                class="fas fa-arrow-left me-2"></i>العودة للقائمة</a>
                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning"><i
                                class="fas fa-edit me-2"></i>تعديل</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
