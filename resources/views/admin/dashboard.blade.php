@extends('layouts.app')

@section('title', 'لوحة التحكم - SallyShop')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">
            <i class="fas fa-tachometer-alt me-2 text-primary"></i>
            لوحة التحكم
        </h1>

        <div class="row">
            <!-- إحصائيات سريعة -->
            <div class="col-md-3 mb-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">الطلبات</h5>
                                <h3>{{ \App\Models\Order::count() }}</h3>
                            </div>
                            <i class="fas fa-shopping-cart fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">المنتجات</h5>
                                <h3>{{ \App\Models\Product::count() }}</h3>
                            </div>
                            <i class="fas fa-box fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">المستخدمين</h5>
                                <h3>{{ \App\Models\User::count() }}</h3>
                            </div>
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">الفئات</h5>
                                <h3>{{ \App\Models\Category::count() }}</h3>
                            </div>
                            <i class="fas fa-tags fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- الطلبات الأخيرة -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-clock me-2"></i>
                            آخر الطلبات
                        </h5>
                    </div>
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
                                    @foreach (\App\Models\Order::with('user')->latest()->take(5)->get() as $order)
                                        <tr>
                                            <td>#{{ $order->id }}</td>
                                            <td>{{ $order->user->name ?? 'غير محدد' }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'pending' ? 'warning' : 'info') }}">
                                                    {{ $order->status }}
                                                </span>
                                            </td>
                                            <td>{{ number_format($order->total, 2) }} ر.س</td>
                                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <a href="{{ route('admin.orders.show', $order) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.orders.edit', $order) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- قائمة الإجراءات السريعة -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-bolt me-2"></i>
                            إجراءات سريعة
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">
                                <i class="fas fa-shopping-cart me-2"></i>
                                إدارة الطلبات
                            </a>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-success">
                                <i class="fas fa-box me-2"></i>
                                إدارة المنتجات
                            </a>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-info">
                                <i class="fas fa-tags me-2"></i>
                                إدارة الفئات
                            </a>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-warning">
                                <i class="fas fa-users me-2"></i>
                                إدارة المستخدمين
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
