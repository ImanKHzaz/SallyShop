@extends('layouts.app')

@section('title', 'عرض الفئة - SallyShop')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0">
                <div class="card-header bg-info text-white border-0">
                    <h3 class="mb-0"><i class="fas fa-eye me-2"></i>عرض الفئة</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center mb-3">
                            <i class="fas fa-tag fa-5x text-success"></i>
                        </div>
                        <div class="col-md-9">
                            <h4 class="text-success mb-3">{{ $category->name }}</h4>
                            <hr>
                            <p><i class="fas fa-link me-2 text-muted"></i><strong>الرابط (Slug):</strong>
                                <code>{{ $category->slug }}</code></p>
                            <p><i class="fas fa-box me-2 text-muted"></i><strong>عدد المنتجات:</strong> <span
                                    class="badge bg-info">{{ $category->products->count() }}</span></p>
                            <p><i class="fas fa-calendar me-2 text-muted"></i><strong>تاريخ الإنشاء:</strong>
                                {{ $category->created_at->format('Y-m-d H:i') }}</p>
                            <p><i class="fas fa-clock me-2 text-muted"></i><strong>منذ:</strong>
                                {{ $category->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex gap-2">
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary"><i
                                class="fas fa-arrow-left me-2"></i>العودة للقائمة</a>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning"><i
                                class="fas fa-edit me-2"></i>تعديل</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
