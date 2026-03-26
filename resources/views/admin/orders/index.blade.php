@extends('layouts.app')

@section('title', 'إدارة الطلبات - لوحة التحكم')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>
                <i class="fas fa-shopping-cart me-2 text-primary"></i>
                إدارة الطلبات
            </h1>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                العودة للوحة التحكم
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>رقم الطلب</th>
                                <th>المستخدم</th>
                                <th>الحالة</th>
                                <th>المجموع</th>
                                <th>التاريخ</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->user->name ?? 'غير محدد' }}</td>
                                    <td>
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
                                    </td>
                                    <td>{{ number_format($order->total, 2) }} ر.س</td>
                                    <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.orders.show', $order) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i> عرض
                                        </a>
                                        <a href="{{ route('admin.orders.edit', $order) }}"
                                            class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-edit"></i> تعديل
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
