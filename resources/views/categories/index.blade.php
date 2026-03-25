@extends('layouts.app')

@section('title', 'إدارة الفئات - SallyShop')

@section('content')
    <h1 class="mb-4 text-center"><i class="fas fa-tags me-2"></i>إدارة الفئات</h1>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('categories.create') }}" class="btn btn-primary"><i class="fas fa-plus me-2"></i>إضافة فئة جديدة</a>
        <a href="{{ route('products.index') }}" class="btn btn-secondary"><i class="fas fa-boxes me-2"></i>المنتجات</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="fas fa-hashtag"></i></th>
                            <th><i class="fas fa-tag"></i> الاسم</th>
                            <th><i class="fas fa-link"></i> السلج</th>
                            <th><i class="fas fa-list"></i> عدد المنتجات</th>
                            <th><i class="fas fa-cogs"></i> الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td><code>{{ $category->slug }}</code></td>
                                <td><span class="badge bg-info">{{ $category->products->count() }}</span></td>
                                <td>
                                    <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-info me-1"
                                        title="عرض">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning me-1"
                                        title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذه الفئة؟');">
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
                                <td colspan="5" class="text-center py-4">
                                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                    <p class="mb-0">لا توجد فئات حتى الآن</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $categories->links() }}
    </div>
@endsection
