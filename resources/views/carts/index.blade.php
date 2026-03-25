@extends('layouts.app')

@section('title', 'إدارة السلات - SallyShop')

@section('content')
    <h1 class="mb-4 text-center"><i class="fas fa-shopping-cart me-2"></i>إدارة السلات</h1>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('carts.create') }}" class="btn btn-primary"><i class="fas fa-plus me-2"></i>إنشاء سلة جديدة</a>
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
                            <th><i class="fas fa-user"></i> المستخدم</th>
                            <th><i class="fas fa-list"></i> عدد العناصر</th>
                            <th><i class="fas fa-calendar"></i> تاريخ الإنشاء</th>
                            <th><i class="fas fa-cogs"></i> الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($carts as $cart)
                            <tr>
                                <td>{{ $cart->id }}</td>
                                <td>
                                    <span
                                        class="badge
                                    {{ $cart->status === 'active' ? 'bg-success' : ($cart->status === 'ordered' ? 'bg-info' : 'bg-warning') }}">
                                        {{ $cart->status }}
                                    </span>
                                </td>
                                <td>{{ $cart->user?->name ?? 'لا يوجد' }}</td>
                                <td><span class="badge bg-secondary">{{ $cart->items->count() }}</span></td>
                                <td>{{ $cart->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('carts.show', $cart) }}" class="btn btn-sm btn-info" title="عرض">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('carts.edit', $cart) }}" class="btn btn-sm btn-warning me-1"
                                        title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('carts.destroy', $cart) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('هل أنت متأكد من حذف هذه السلة؟');">
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
                                <td colspan="6" class="text-center py-4">
                                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                    <p class="mb-0">لا توجد سلات حتى الآن</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $carts->links() }}
    </div>
@endsection
