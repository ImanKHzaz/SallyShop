@extends('layouts.app')

@section('title', 'إدارة الطلبات - SallyShop')

@section('content')
    <h1 class="mb-4 text-center"><i class="fas fa-receipt me-2"></i>إدارة الطلبات</h1>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('orders.create') }}" class="btn btn-primary"><i class="fas fa-plus me-2"></i>إنشاء طلب جديد</a>
        <a href="{{ route('home') }}" class="btn btn-secondary"><i class="fas fa-home me-2"></i>الصفحة الرئيسية</a>
    </div>

    <div class="card border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="fas fa-hashtag"></i></th>
                            <th><i class="fas fa-ring"></i> الحالة</th>
                            <th><i class="fas fa-dollar-sign"></i> المجموع</th>
                            <th><i class="fas fa-user"></i> المستخدم</th>
                            <th><i class="fas fa-list"></i> عدد العناصر</th>
                            <th><i class="fas fa-calendar"></i> تاريخ الطلب</th>
                            <th><i class="fas fa-cogs"></i> الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>
                                    <span
                                        class="badge
                                    {{ $order->status === 'pending' ? 'bg-warning' : ($order->status === 'processing' ? 'bg-info' : ($order->status === 'completed' ? 'bg-success' : 'bg-danger')) }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="fw-bold text-success">{{ number_format($order->total, 2) }} ر.س</td>
                                <td>{{ $order->user?->name ?? 'لا يوجد' }}</td>
                                <td><span class="badge bg-secondary">{{ $order->items->count() }}</span></td>
                                <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info" title="عرض">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('orders.edit', $order) }}" class="btn btn-sm btn-warning me-1"
                                        title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('هل أنت متأكد من حذف هذا الطلب؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" title="حذف">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                    <p class="mb-0">لا توجد طلبات حتى الآن</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $orders->links() }}
    </div>
@endsection
