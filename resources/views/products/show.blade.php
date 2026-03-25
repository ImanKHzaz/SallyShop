@extends('layouts.app')

@section('title', 'عرض المنتج - SallyShop')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h3 class="mb-0"><i class="fas fa-eye me-2"></i>عرض المنتج</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center mb-3">
                            <i class="fas fa-box fa-5x text-primary"></i>
                        </div>
                        <div class="col-md-8">
                            <h4 class="text-primary">{{ $product->name }}</h4>
                            <hr>
                            <p><i class="fas fa-tag me-2"></i><strong>الفئة:</strong>
                                {{ $product->category?->name ?? 'غير مصنف' }}</p>
                            <p><i class="fas fa-align-left me-2"></i><strong>الوصف:</strong>
                                {{ $product->description ?: 'لا يوجد وصف' }}</p>
                            <p><i class="fas fa-dollar-sign me-2"></i><strong>السعر:</strong> <span
                                    class="text-success fw-bold">{{ number_format($product->price, 2) }} ر.س</span></p>
                            <p><i class="fas fa-cubes me-2"></i><strong>الكمية:</strong> {{ $product->quantity }}</p>
                            <p><i class="fas fa-calendar me-2"></i><strong>تاريخ الإضافة:</strong>
                                {{ $product->created_at->format('Y-m-d H:i') }}</p>
                            <p><i class="fas fa-clock me-2"></i><strong>منذ:</strong>
                                {{ $product->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex gap-2">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary"><i
                                class="fas fa-arrow-left me-2"></i>العودة للقائمة</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning"><i
                                class="fas fa-edit me-2"></i>تعديل</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
