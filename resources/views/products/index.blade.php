@extends('layouts.app')

@section('title', 'إدارة المنتجات - SallyShop')

@section('content')
    <h1 class="mb-4 text-center"><i class="fas fa-boxes me-2"></i>قائمة المنتجات</h1>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('products.create') }}" class="btn btn-primary"><i class="fas fa-plus me-2"></i>إضافة منتج جديد</a>
        <a href="{{ route('home') }}" class="btn btn-secondary"><i class="fas fa-home me-2"></i>الصفحة الرئيسية</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="fas fa-hashtag"></i></th>
                            <th><i class="fas fa-tag"></i> الفئة</th>
                            <th><i class="fas fa-box"></i> الاسم</th>
                            <th><i class="fas fa-align-left"></i> الوصف</th>
                            <th><i class="fas fa-dollar-sign"></i> السعر</th>
                            <th><i class="fas fa-cubes"></i> الكمية</th>
                            <th><i class="fas fa-cogs"></i> الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->category?->name ?? '-' }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ Str::limit($product->description, 50) }}</td>
                                <td class="fw-bold text-success">{{ number_format($product->price, 2) }} ر.س</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info me-1"
                                        title="عرض">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning me-1"
                                        title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
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
                                    <p class="mb-0">لا توجد منتجات حتى الآن</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection
